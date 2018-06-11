<?php
if (isset($_POST['pseudo']) && isset($_POST['pw'])){
  users::inscription($_POST['pseudo'],$_POST['pw'] );
} ?>


<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
<form name="sentMessage" id="contactForm" method="post" novalidate>
  <div class="control-group">
    <div class="form-group floating-label-form-group controls">
      <label>Pseudo</label>
      <input name="pseudo" type="text" class="form-control" placeholder="Pseudo" id="name" required data-validation-required-message="Please enter your name.">
      <p class="help-block text-danger"></p>
    </div>
  </div>
  <div class="control-group">
    <div class="
    form-group floating-label-form-group controls">
      <label>Mot de passe</label>
      <input name="pw" type="password" class="form-control" placeholder="Mot De Passe" id="mdp" required>
      <p class="help-block text-danger"></p>
    </div>
    <br>
    <div id="success"></div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" id="sendMessageButton">S'inscrire</button>
    </div>
  </div>
</div>
</div>
