<style>
  .edit-input {
    display: none;
  }
</style>

<body>
  <div class="control-group">
    <label for="name" class="control-label">
      <p class="text-info">Saghir<i class="icon-star"></i></p>
    </label>

    <input type="text" class="edit-input" />

    <div class="controls">
      <a class="edit" href="#">Edit</a>
    </div>
  </div>

  <script src="./node_modules/jquery/dist/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      $('a.edit').click(function() {
        console.log($(this));
        var dad = $(this).parent().parent();
        dad.find('label').hide();
        dad.find('input[type="text"]').show().focus();
      });

      $('input[type=text]').focusout(function() {
        var dad = $(this).parent();
        $(this).hide();
        dad.find('label').show();
      });
    });
  </script>
</body>