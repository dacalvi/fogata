<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Sidebarmenu_model extends CI_Model {

    private function _getItem($record, $items=null){
        $obj = (object)array("title" => $record->name, 'url'=> $record->url, 'urltype'=>$record->urltype, 'icon'=>$record->icon);
        if(!is_null($items)){
            $obj->items = [];
        }
        return $obj;
    }

    private function _getCategories(){
        return $this->db->get('dashboard_menu_categories')->result();
    }

    private function _getItems($category_id){
        $ret_val = [];
        $topLevelItems = $this->db->get_where('dashboard_menu_items', ['parent_category_id'=>$category_id])->result();
        foreach($topLevelItems as $tli){
            $item = $this->_getItem($tli);
            if($childs = $this->_getChildItems($tli->id)){
                $item->items = $childs;
            }
            if($this->_canISeeMenuItem($tli->id))
                $ret_val[] = $item;
        }
        return $ret_val;
    }

    private function _getChildItems($parent_id){
        $ret_val = [];
        $result = $this->db->get_where('dashboard_menu_items', ['parent_item_id'=>$parent_id])->result();
        foreach($result as $r){
            if($this->_canISeeMenuItem($r->id))
                $ret_val[] = $this->_getItem($r);
        }
        return $ret_val;
    }

    public function getSidebarItems(){
        $res = [];
        $categories = $this->_getCategories();

        foreach ($categories as $keycat => $category) {
            $menuitem = (object)array("title" => $category->name);
            $menuitem->items = $this->_getItems($category->id);
            $res[] = $menuitem;
        }
        return $res;
    }


    private function _getMenuGroups($menu_item_id){
        //$result = $this->db->get_where('dashboard_menu_permissions', ['menu_item_id'=>$menu_item_id])->result();
        //var_dump($result, $menu_item_id);die();
        
        return array_map(
            create_function('$o', 'return $o->user_group_id;'), 
            $this->db->get_where('dashboard_menu_permissions', ['menu_item_id'=>$menu_item_id])->result()
        );
        
    }

    private function _canISeeMenuItem($menu_item_id){
        $groups = $this->_getMenuGroups($menu_item_id);

        //var_dump($menu_item_id, $groups);die();

        return $this->ion_auth->in_group($groups);
    }

}