<?php 

use Core\FH;


?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-6 offset-md-3" >
  <div class="card" >
    <div class="card-body">
      <form action="" class="form" method="post">
        <h3 class="text-center">Register</h3>
        <?=FH::displayErrors($this->displayErrors)?>
        <?=FH::csrfInput() ?>
        <?=FH::inputBlock('text','First Name','fname',$this->newUser->fname,['class' => 'form-control input-sm'],['class' => 'form-group']) ?>
        <?=FH::inputBlock('text','Last Name','lname',$this->newUser->lname,['class' => 'form-control input-sm'],['class' => 'form-group']) ?>
        <?=FH::inputBlock('text','Email','email',$this->newUser->email,['class' => 'form-control input-sm'],['class' => 'form-group']) ?>
        <?=FH::inputBlock('text','Choose a Username','username',$this->newUser->username,['class' => 'form-control input-sm'],['class' => 'form-group']) ?>
        <?=FH::inputBlock('password','Password','password',$this->newUser->password,['class' => 'form-control input-sm'],['class' => 'form-group']) ?>
        <?=FH::inputBlock('password','Confirm Password','confirm',$this->newUser->getConfirm(),['class' => 'form-control input-sm'],['class' => 'form-group']) ?>
        <?=FH::submitBlock('Register',['class' => 'btn btn-primary btn-large'],['class' => 'd-flex justify-content-end']) ?>
      </form>
    </div>
  </div>
</div>
<?php $this->end(); ?>