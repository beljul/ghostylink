<div class="links form col-lg-10 col-md-9">
    <?php
    if (!isset($link)){
        echo $this->Form->create('Link', ['action' => 'add', 'id' => 'links-add']);
    }
    else {
        echo $this->Form->create($link);
    }
    ?>
    <legend>Create your ghost</legend>
    <fieldset>
        <?php
            echo $this->Form->input('title', ['type' => 'text',
                                              'id' => 'inputTitle',
                                              'class' => 'form-control link-add',
                                              'placeholder' => "Enter a title",
                                              'required' => 'false']);
            echo $this->Form->input('content', ['type' => 'textarea',
                                              'id' => 'inputContent',
                                              'class' => 'form-control',
                                              'placeholder' => "Enter your private contents",
                                              'required' => 'false']);?>
        <label>Your components</label>
        <ul id="link-components-chosen" class="col-lg-12">
            <?php
                if(isset($_POST['flag-max_views'])) {
                    $htmlComponent = '<li class="glyphicon glyphicon-eye-open ' .
                                                'label label-primary" ' .
                                                'data-related-field="max_views">'
                                .   ' </li>';
                    echo $htmlComponent;
                    echo $this->Form->hidden("flag-max_views");
                }
                if(isset($_POST['flag-death_time'])) {
                    $htmlComponent = '<li class="glyphicon glyphicon-time ' .
                                                'label label-primary" ' .
                                                'data-related-field="death_time">'
                                .   ' </li>';
                    echo $htmlComponent;
                    echo $this->Form->hidden("flag-death_time");
                }
                if(!isset($_POST['flag-max_views']) && !isset($_POST['flag-death_time'])) {
                    echo '<span class="legend">Drop some components here</span>';
                }
            ?>
        </ul>
        <?php
        if(isset($_POST['flag-max_views'])) {
            echo $this->Form->input('max_views', ['type' => 'number',
                                              'id' => 'inputContent',
                                              'class' => 'form-control',
                                              'placeholder' => "Enter your links life expectancy (number of views)",
                                              'required' => 'false']);
        }
        else if ($this->Form->isFieldError('max_views')){
            echo  $this->Form->error('max_views');
        }
        if(isset($_POST['flag-death_time'])) {
            $options = array(['text' => '1 day', 'value' => 1, 'checked' => 'checked'],
                                         ['text' => '1 week', 'value' => 7],
                                         ['text' => '1 month', 'value' => 30]);
            $attributes = ['nestedInput' => false];
            ?>
            <div id="id_death_time"  class="input"><label>Time before deletion:</label><br/><?php
            $this->Form->radio('death_time', $options, $attributes);
            echo $this->Form->radio('death_time', $options, $attributes);
            ?></div><?php
        }

        ?>
    </fieldset>
    <?= $this->Form->button(__('Create the link'), ['type' => 'submit',
                                                   'class' => 'col-lg-6 col-lg-offset-3 '.
                                                              'col-md-6 col-md-offset-3 '.
                                                              'col-sm-6 col-sm-offset-3 '.
                                                              'col-xs-6 col-xs-offset-3 '.
                                                              'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
