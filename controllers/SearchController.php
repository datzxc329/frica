
<!--Tìm kiếm sản phẩm với từ khóa là tên loại sản phẩm và tên sản phẩm, có gợi ý khi nhập những chữ cái đầu của từ khóa-->
<?php
require_once('controllers/BaseController.php');
require_once('models/product.php');
require_once('models/category.php');
class SearchController extends BaseController
{
    function __construct()
    {
        $this->folder = 'search';

    }
    public function search(){
        $query = isset($_GET['query']) ? $_GET['query'] : '';
        $searchProducts = Product::searchWithProductName($query);
        $searchCategories = Category::searchWithCategoryName($query);

        $suggestions = [];
        //Thêm tên sản phẩm từ kết quả tìm kiếm vào mảng suggestions
        foreach ($searchProducts as $product) {
            $suggestions[] = $product['name'];
        }

        // Thêm tên loại sản phẩm từ kết quả tìm kiếm vào mảng suggestions
        foreach ($searchCategories as $category) {
            $suggestions[] = $category['name'];
        }
        $_SESSION['suggestions'] = $suggestions;
        print_r(json_encode($_SESSION['suggestions']));
        $data = array(
            'searchProducts' => $searchProducts,
            'searchCategories' => $searchCategories,
        );
        //print_r($data);
        $this->render('search', $data);
    }

}