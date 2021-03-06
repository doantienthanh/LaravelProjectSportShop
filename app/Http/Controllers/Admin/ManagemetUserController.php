<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payments;
use App\Products;
use App\Companies;
use App\Categories;
use App\Sizes;
use App\Details;
use App\SizeProducts;
use App\Carts;
use App\Mail\EmailOrder;
use App\User;
use App\Orders;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class ManagemetUserController extends Controller
{
    function returnPagesManagement()
    {
        $payments = Payments::all();
        foreach ($payments as $payment) {
            $payment->users;
        }
        return view('admin.payment.managementAddMoney', ['payments' => $payments]);
    }
    function deleteAddMoney($id)
    {
        Payments::find($id)->delete();
        return redirect('/admin/management/AddMoneyOfUser');
    }
    function acceptAddMoney($id)
    {
        $payments = Payments::find($id);
        $id_user = $payments->user_id;
        $money= $payments->money;
        $users = User::where('id', $id_user)->first();
        $users->money=$money;
        $users->save();
        Payments::find($id)->delete();
        return redirect('/admin/management/AddMoneyOfUser');
    }
    function getPayment(){
        $orders=Orders::all();
        return view('admin.payment.managementOrderProducts',['orders'=>$orders]);

     }
     function viewDetailPayment($id,$ida){
        $users=User::find($ida);
        $orders=Orders::where('id',$id)->first();

        $products=[];
        $quantities=json_decode($orders->quantity);
        $id=json_decode($orders->id_allProducts);
        foreach($id as $ida){
          foreach($ida as $item){
              $productses=Products::find($item);
            array_push($products,$productses);
          }
        }
   return view('admin.payment.viewDetailOrder',['products'=>$products,'users'=>$users,'orders'=>$orders]);
               }
               function returnAllUsers(){
               $users=User::where('position','user')->get();
               return view('admin.users.allUsers',['users'=>$users]);
               }
               function deleteUsers($id){
                   User::find($id)->delete();
                   return redirect('/admin/getAllUsers');
               }


              function adminOrderToUsers($id){
                $orders=Orders::find($id);
                $emailUser=$orders->email;
                $address=$orders->address;
                $nameUser=$orders->fullNameUserOrder;
                $date=$orders->created_at;
                $price=$orders->getTotalPriceOrder();
                $prices=$orders->totalPriceOrder;
                $products=[];
                $id=json_decode($orders->id_allProducts);
                foreach($id as $ida){
                  foreach($ida as $item){
                      $productses=Products::find($item);
                    array_push($products,$productses);
                  }
              }
              $data=[
                'title'=>'Email Thông báo đơn hàng',
                'name'=>$nameUser,
                'address'=>$address,
                'price'=>$price,
                'date'=>$date
            ];
          \Mail::to($emailUser)->send(new EmailOrder($data,$products));

          // Trừ tiền của user vừa mới order
        $id_users=$orders->user_id;
        $users=User::find($id_users);
        $users->money-=$prices;
        $users->save();
        return redirect('/admin/management/payments');
    }
}
