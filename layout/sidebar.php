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
        new ItemSidebar("Trang Chủ", "#"),
        new ItemSidebar("Sản Phẩm", "/Project_WebBanHang/Template-Views/Admin/Product/Index.php"),
        new ItemSidebar("Loại Sản Phẩm", "/Project_WebBanHang/Template-Views/Admin/Category/Index.php"),
        new ItemSidebar("Quản Lý Thành Viên", "/Project_WebBanHang/Template-Views/Admin/User/Index.php"),
        new ItemSidebar("Quản lý đơn hàng", "javascript:void(0);"),
        new ItemSidebar("Đăng Xuất", "#")
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