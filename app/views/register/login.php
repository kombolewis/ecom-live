<?php 
use Core\FH;
?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="col-md-6 offset-md-3" >
  <div class="card" >
    <div class="card-body">
      <form action="<?=PROOT?>register/login" class="form" method="post">
        <h3 class="text-center">Login</h3>
        <?=FH::csrfInput(); ?>
        <?=FH::displayErrors($this->displayErrors) ?>
        <?=FH::inputBlock('text','Username','username',$this->login->username,['class' =>'form-control'],['class' => 'form-group']) ?>
        <?=FH::inputBlock('password','Password','password',$this->login->password,['class' =>'form-control'],['class' => 'form-group']) ?>
        <?=FH::checkboxBlock('Remember Me','remember_me',$this->login->getRememberMechecked(),[],['class' => 'form-group'])?>
        <?=FH::submitBlock('Login',['class' => 'btn btn-primary'],['class' => 'form-group']) ?>

        <div class="d-flex justify-content-end">
          <a href="<?=PROOT?>register/register">Register</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->end(); ?>

