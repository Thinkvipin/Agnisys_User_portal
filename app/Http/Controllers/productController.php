<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Session;
class productController extends Controller
{
    public function all(){
        $data = Session::all();         
        if(!isset($data['cid'])){             return redirect('/');         }
        $products = product::select('*')->get();
        $pods = json_encode($this->multilevelItem(0,0));

        $page =6;
        return view('admin.superAdmin.product-all',compact('page','data','products','pods'));
    }
    /**
     * add 
     */
    public function add(){
        $data = Session::all();         
        if(!isset($data['cid'])){             return redirect('/');         }
        $products = product::select('*')->get();
        $pods = json_encode($this->multilevelItem(0,0));
        $page =6;
        return view('admin.superAdmin.product-add',compact('page','data','products','pods'));
    }
    /**
     * add DB
     */
    public function addDb(Request $request){
        $data = Session::all();         
        if(!isset($data['cid'])){             return redirect('/');         }
        
        $p = new product;
        $p->name = $request->name;
        $p->parent = $request->parent;
        $p->alm=' ';
        $p->flex=' ';
        $p->save();

        session()->flash('alert-success', 'Product added successfully');
        $page =6;
        return redirect()->back()->with(compact('page'));
    }
    /**
     * edit
     */
    public function edit($id){
        $data = Session::all();         
        if(!isset($data['cid'])){             return redirect('/');         }
        $products = product::select('*')->get();
        $product = product::where('id',$id)->get();
        $pods = json_encode($this->multilevelItem(0,0));
        $page =6;
        return view('admin.superAdmin.product-edit',compact('page','data','product','products','pods'));
    }
    /**
     * edit Db
     */
    public function editDb(Request $request){
        $data = Session::all();         
        if(!isset($data['cid'])){             return redirect('/');         }
        
        product::where('id',$request->id)->update(array(
            "name" => $request->name,
            "parent" => $request->parent,
        ));

        session()->flash('alert-success', 'Product updated successfully');
        $page =6;
        return redirect()->back()->with(compact('page'));
    }
    /**
     * delete
     */
    public function delete($id){
        $data = Session::all();         
        if(!isset($data['cid'])){             return redirect('/');         }
        $pod = product::select('parent')->where(["id" => $id])->get()->first();
        product::where('id',$id)->delete();
        product::where('parent',$id)->update(['parent'=> $pod->parent]);
        
        \App\license::where('pid',$id)->update(
            array(
                'pid' => 0,
            )
        );
        
        session()->flash('alert-success', 'Product deleted successfully');
        $page =6;
        return redirect()->back()->with(compact('page'));
    }
    /**
    *
    */
    public function multilevelItem($i,$parent_id){
		$data = [];
		
		if(!$parent_id){
			$lists = \App\product::select('*')->where('parent',0)->get();
		}
		else{
			$lists = \App\product::select('*')->where('parent',$parent_id)->get();
		}
		foreach($lists as $item){
			
			if(!$parent_id){
				$block = [
					"name" => $item->name,
					"path" => $item->path,
					"indent" => $i,
					"id" => $item->id,
				];
			}
			elseif($item->parent == $parent_id){
				$block = [
					"name" => $item->name,
					"path" => $item->path,
					"indent" => $i,
					"id" => $item->id,
				];
			}
			
			
			$block["childs"] = $this->multilevelItem($i+3,$item->id);
			$data[] = $block;
			// dd($c);
		}
		return $data;
    }
    
}
