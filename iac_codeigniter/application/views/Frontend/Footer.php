

<footer class="myfooter">
    <div class="container">
        <div class="row">
            <hr style=" border-width: 1.1px;">
            <div class="col-sm-6">
                <img class="logoif" src="<?php echo base_url("img/logo_if.png") ?>" style="margin-top: 6x;" height="110px" id="logo">
            </div>
            <div id="logo" class="col-sm-6 text-right" style="color: silver;margin-top: 10px;">
                <p>Desenvolvido por: Samuel Lucas e Naiara Gaspar</p>
                <p>Copyhigth @ 2018 - <a href="<?= base_url('Backend/Index') ?>">Painel administrativo</a></p>
            </div>
        </div>
    </div>
</footer>

<script>
    $(document).ready(function() {
  $('.form_campos').on('focus blur', function(e) {
    $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
  }).trigger('blur');
  $('.select').on('change blur', function(e) {
    $(this).parents('.form-group-select').toggleClass('focused', (e.type === 'focus' || this.value !== ''));
  }).trigger('blur');

  $(".autofocus").trigger('focus');

  // Converte minusculas em maiusculas
  $('input').not('[name="link"]').on('input', function() {

    // Armazena posição corrente do cursor
    var start = this.selectionStart,
      end = this.selectionEnd;
    this.value = this.value.toUpperCase();

    // Restaura posição armazenada anteriormente.
    this.setSelectionRange(start, end);
  });
});
</script>

 <script>
     $(document).ready(function()
{
    var navItems = $('.admin-menu li > a');
    var navListItems = $('.admin-menu li');
    var allWells = $('.admin-content');
    var allWellsExceptFirst = $('.admin-content:not(:first)');
    
    allWellsExceptFirst.hide();
    navItems.click(function(e)
    {
        e.preventDefault();
        navListItems.removeClass('active');
        $(this).closest('li').addClass('active');
        
        allWells.hide();
        var target = $(this).attr('data-target-id');
        $('#' + target).show();
    });
});
 </script>
  <script>

    $(document).ready(function () {
        $('#myCarousel').carousel({
            interval: 4000});
        var clickEvent = false;
        $('#myCarousel').on('click', '.aux a', function () {
            clickEvent = true;
            $('.aux li').removeClass('active');
            $(this).parent().addClass('active');
        }).on('slid.bs.carousel', function (e) {
            if (!clickEvent) {
                var count = $('.aux').children().length - 1;
                var current = $('.aux li.active');
                current.removeClass('active').next().addClass('active');
                var id = parseInt(current.data('slide-to'));
                if (count === id) {
                    $('.aux li').first().addClass('active');
                }
            }
            clickEvent = false;
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.formlogin novologin').click(function () {
            var button = $(this);
            if (button.attr("data-dismiss") != "modal") {
                var inputs = $('form input');
                var title = $('.modal-title');
                var progress = $('.progress');
                var progressBar = $('.progress-bar');
                inputs.attr("disabled", "disabled");
                button.hide();
                progress.show();
                progressBar.animate({width: "100%"}, 100);

                progress.delay(1000)
                        .fadeOut(600);
                button.text("Pronto")
                        .removeClass("btn-primary")
                        .addClass("btn-success")
                        .blur()
                        .delay(1600)
                        .fadeIn(function () {
                            title.text("Login efetuado.");
                            button.attr("data-dismiss", "modal");
                        });
            }
        });

        $('#login-nav').on('hidden.bs.modal', function (e) {
            var inputs = $('form input');
            var title = $('.modal-title');
            var progressBar = $('.progress-bar');
            var button = $('.formlogin- button');
            inputs.removeAttr("disabled");
            title.text("Área de membros");
            progressBar.css({"width": "0%"});
            button.removeClass("btn-success")
                    .addClass("btn-primary")
                    .text("Ok")
                    .removeAttr("data-dismiss");

        });
    });


</script>


</body>
</html>