<?php
class ItemSidebar
{   
    public $id;
    public $name;
    public $href;
    public function __construct($id,$name, $href)
    {   
        $this->id = $id;
        $this->name = $name;
        $this->href = $href;
    }
}

function sidebar()
{

    $myArray = [
        new ItemSidebar("Page1","Trang chủ", "/Project_WebBanHang/Template-Views/Admin/Index.php"),
        new ItemSidebar("Page2","Sản phẩm", "/Project_WebBanHang/Template-Views/Admin/Product/Index.php"),
        new ItemSidebar("Page3","Danh mục sản phẩm", "/Project_WebBanHang/Template-Views/Admin/Category/Index.php"),
        new ItemSidebar("Page4","Khách hàng", "/Project_WebBanHang/Template-Views/Admin/User/Index.php"),
        new ItemSidebar("Page5","Đơn hàng", "javascript:void(0);"),
        new ItemSidebar("Page6","Khuyến mãi", "/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php"),
        new ItemSidebar("Page7","Đăng xuất", "/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php")
    ];

    $html = '';
    foreach ($myArray as $item) {
        $html .= '<li class="nav-item dropdown"> 
                <a href="' . $item->href . '" class="nav-link"  data-page="'.$item->href.'">
                    <span class="title">' . $item->name . '</span>
                </a>
            </li>
        ';
    }

    return $html;
}
// href="' . $item->href . '"