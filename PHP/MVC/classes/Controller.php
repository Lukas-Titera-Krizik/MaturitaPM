<?php

class Controller {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function showItems() {
        if (!isset($_GET['q'])){
            $items = $this->model->getItems();
            include 'views/items_list.php';
        }else{
            $items = $this->model->searchItems($_GET['q']);
            foreach ($items as $item){
                echo "<li>
                    <a href='/detail/?id=" . $item['id'] . "'>" . htmlspecialchars($item['name']) . "</a>
                    <a href='/item/edit/?id=" . $item['id'] . "'>Edit</a>
                    <a href='/delete/?id=" . $item['id'] . "'>Smazat</a>
                    </li>";
            }
        }

    }

    public function addItemForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['itemName']) && isset($_POST['itemPocet'])) {
            $this->model->addItem($_POST['itemName'], $_POST['itemPocet']);
            header('Location: /');
            exit;
        }
        include 'views/add_item.php';

    }

    public function showItemDetail() {
        if (!isset($_GET['id'])) {
            echo "Item ID not specified";
            return;
        }
        $item = $this->model->getItemById($_GET['id']);
        include 'views/item_detail.php';
    }

    public function showAbout() {

        include 'views/about.php';
    }

    public function deleteItem() {
        if (!isset($_GET['id'])) {
            echo "Item ID not specified";
            return;
        }
        $item = $this->model->deleteItem($_GET['id']);
        include 'views/delete.php';
    }

    public function editItem() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['itemName'])) {
            $this->model->updateItem($_GET['id'], $_POST['itemName']);
            header('Location: /');
            exit;
        }

        include 'views/item_edit.php';
    }

    public function vyplneniItem(){
        $id = $_GET['id'];
        $name = $this->model->vyplneniItem($id);

        echo $name['name'];

    }



}
