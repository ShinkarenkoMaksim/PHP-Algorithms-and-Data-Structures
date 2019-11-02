<?php

$connect = mysqli_connect('localhost', 'root', '', 'shop', '3307') or die('Not connection');

$query = "SELECT * FROM category_links JOIN categories_db ON categories_db.id_category = category_links.child_id ORDER BY category_links.level;";


$result = mysqli_query($connect, $query);
$cats = [];


while ($cat = mysqli_fetch_assoc($result)) {

    $cats[$cat['level']][] = $cat;

}

mysqli_close($connect);

function buildTree ($cats, $level = 0, $parent = 1) {
	if(is_array($cats) && isset($cats[$level])) {
		$tree = "<ul>";
		foreach ($cats[$level] as $cat) {
		    if ($cat['parent_id'] == $parent) {
                $tree .= "<li>" . $cat['category_name'];
                if (is_array($cats[$level + 1]))
                    $tree .= buildTree($cats, $level + 1, $cat['child_id']); //Ох и велосипед я тут изобрёл... Не факт, что с увеличением количества элементов или вложенности это будет работать корректно...
                $tree .= "</li>";
            }
		}
		$tree .="</ul>";
		return $tree;
	}
}

echo  buildTree($cats);




/*$query = "SELECT * FROM categories";


$result = mysqli_query($connect, $query);
$cats = [];
while ($cat = mysqli_fetch_assoc($result)) {
    $cats[$cat['parent_id']][$cat['id']] = $cat;
}
mysqli_close($connect);
var_dump($cats);

function buildTree ($cats, $parent_id) {

    if(is_array($cats) && isset($cats[$parent_id])) {
        $tree = "<ul>";
        foreach ($cats[$parent_id] as $cat) {
            $tree .= "<li>".$cat['name'];
            $tree .= buildTree($cats, $cat['id']);
            $tree .= "</li>";
        }
        $tree .="</ul>";
        return $tree;
    }
}

echo  buildTree($cats, 0);*/
