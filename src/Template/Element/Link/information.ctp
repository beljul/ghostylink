<aside class="col-lg-4 col-md-4">
    <article class="link-stats panel panel-default">
        <h2 class="panel-heading">Link statistics</h2>
        <div class="panel-body">
            <?= $this->element("Link/life_percentage", array("link" => $link)); ?>            
            <?php
            if ($link->max_views != null) {
                echo $this->element("Link/remaining_views", array("link" => $link));
            }
            if ($link->death_time != null) {
                echo $this->element("Link/remaining_time", array("link" => $link));
            }
            ?>
        </div>
    </article>
</aside>
<section class="col-lg-8 col-md-8">
    <article class="panel panel-primary">
        <section class="link-heading panel panel-heading">
            <h2><?= h($link->title) ?></h2>
            <time>Created on <?= h($link->created) ?></time>                
            <?=
            $this->Form->postLink('', ['_name' => 'link-delete', $link->id], ['confirm' => __("Are you sure you want to delete : '") . $link->title . "' ?",
                'class' => 'glyphicon glyphicon-trash delete-link'])
            ?> </li>
        </section>
        <section class="link-content panel-body">
<?= $this->Text->autoParagraph(h($link->content)); ?>
        </section>
    </article>
</section>