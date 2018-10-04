<?php
namespace App\Models;
use DiDom\Document;
use DiDom\Query;
use Illuminate\Database\Eloquent\Model;

class VkModel extends model {

  static public function getContent($link)
  {

    //$document = new Document($link, true);

    //$posts = $document->find('.panel-city');

    /*foreach ($posts as $post) {

      $post = substr($post->text(), 0 , -8);

      if($post == VkModel::setCity($ip)) {

          echo $post->html();

        } else {

          $post = $posts[0];
        }
    }

    return $posts; */
  }

}
 ?>
