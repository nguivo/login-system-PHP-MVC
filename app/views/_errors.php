<?php
    use framework\core\Application;

    /** @var TYPE_NAME $exception */
    

?>
<br><br><br><br>
<div class="page-header">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <h1>Error <?php
                echo $exception->getCode(); ?></h1>
        </div>
    </div>
</div>

<section role="main" class="col-xs-12 col-md-8">
    <p>
        <?php echo $exception->getMessage(); ?>
    </p>

</section>