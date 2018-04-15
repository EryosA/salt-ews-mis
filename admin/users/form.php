<?php if ( ! empty($user->errors)): ?>
  <ul>
    <?php foreach ($user->errors as $error): ?>
      <li><?php echo $error; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<form method="post" id="userForm">
  <div class="form-group">
    <label for="name">Name</label>
    <input id="name" name="name" required="required" class="form-control" value="<?php echo htmlspecialchars($user->name); ?>" />
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input id="email" name="email" required="required" class="form-control" type="email" value="<?php echo htmlspecialchars($user->email); ?>" />
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" />
    <?php if (isset($user->id)): ?><small class="form-text text-muted">Leave blank to keep current password</small><?php endif; ?>
  </div>

  <?php $is_same_user = $user->id == Auth::getInstance()->getCurrentUser()->id; ?>

  <div class="checkbox">
    <label for="is_active">
      <?php if ($is_same_user): ?>
        <input type="hidden" name="is_active" value="1" />
        <input type="checkbox" disabled="disabled" checked="checked" /> active

      <?php else: ?>
        <input id="is_active" name="is_active" type="checkbox" value="1"
               <?php if ($user->is_active): ?>checked="checked"<?php endif; ?>/> active

      <?php endif; ?>
    </label>
  </div>

  <div class="checkbox">
    <label for="is_admin">
      <?php if ($is_same_user): ?>
        <input type="hidden" name="is_admin" value="1" />
        <input type="checkbox" disabled="disabled" checked="checked" /> administrator

      <?php else: ?>
        <input id="is_admin" name="is_admin" type="checkbox" value="1"
               <?php if ($user->is_admin): ?>checked="checked"<?php endif; ?>/> administrator

      <?php endif; ?>
    </label>
  </div>

  <input type="submit" class="btn btn-primary" value="Save" />
  <a href="/admin/users<?php if (isset($user->id)) { echo '/show.php?id=' . $user->id; } ?>">Cancel</a>
</form>

<script>
  $userID = <?php echo isset($user->id) ? $user->id : 'null'; ?>;
</script>
