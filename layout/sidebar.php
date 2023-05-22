<?php
class ItemSidebar
{
    public $name;
    public $href;
    public function __construct($name, $href)
    {
        $this->name = $name;
        $this->href = $href;
    }
}

function sidebar()
{

    $myArray = [
        new ItemSidebar("Trang chủ", "/Project_WebBanHang/Template-Views/Admin/Index.php"),
        new ItemSidebar("Sản phẩm", "/Project_WebBanHang/Template-Views/Admin/Product/Index.php"),
        new ItemSidebar("Danh mục sản phẩm", "/Project_WebBanHang/Template-Views/Admin/Category/Index.php"),
        new ItemSidebar("Khách hàng", "/Project_WebBanHang/Template-Views/Admin/User/Index.php"),
        new ItemSidebar("Đơn hàng", "javascript:void(0);"),
        new ItemSidebar("Khuyến mãi", "/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php"),
        new ItemSidebar("Đăng xuất", "/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php")
    ];

    $html = '';
    foreach ($myArray as $item) {
        $html .= '<li class="nav-item dropdown"> 
                <a href="' . $item->href . '">
                    <span class="title">' . $item->name . '</span>
                </a>
            </li>
        ';
    }

    return $html;
}
