$(function(){
    // Scroll Window
    scrollWindow();
    
    // Activate Language
    activateLang();
    
    // Activate nav search
    activateNavSearch();
    
    // Nav toggle
    navToggle();
    
    // Up Button
    upBtn();
        
    // jQuery UI plugins
    jQueryUI();
    
    // Tour Search Rating Select
    ratingSelect();
    
    // Activate type filter options
    activateTypeFilter();
    
    // See password
    seePassword();
    
    // Activate a room number
    activateRoomNumber();
    
    // Flash Message
    flashMessage();

    // Has Errors
    hasErrors();

    // Submit Devare
    submitDevare();

    // Activate Days
    activateDaysNumber();

    // Nav Tour Height
    navTourHeight();

    // Activate review actions
    reviewActions();

    // Functions
    function scrollWindow(){
        $(window).scroll(function() {
            if (window.scrollY > 0 && (!$('.profile-container').hasClass('hide-overflow')) && (!$('form').hasClass('hide-overflow'))) {
                $('.main-nav').addClass('sticky');
            }else {
                $('.main-nav').removeClass('sticky');
            }
        });
    }
    function activateLang(){
        var dropdown = $('nav .dropdown, header .dropdown');
        var dropdownMenu = $('nav .dropdown-menu, header .dropdown .dropdown-menu');

        dropdown.on('click', function(){
            dropdownMenu.slideToggle('slow');
        });
    }
    function activateNavSearch(){
        var search = $('nav .nav-items .search-nav-item');
        var form = $('nav form');

        search.on('click', function(){
            form.slideToggle('slow');
        });
    }
    function navToggle(){
        var smallnav = $('.small-nav');
        var mainToggle = $('.main-nav .nav-items .toggle');
        var smallToggle = $('.small-nav .nav-items .toggle');
        var adNav = $('.admin-nav');
        var adNavToggle = $('main header .toggle');
        var adNavXToggle = $('.admin-nav .close-toggle');
        
        mainToggle.on('click', function() {
            smallnav.css('display', 'block').addClass('animate__fadeInRight');
            $('.body-background-overlay').addClass('active');
        });   
        smallToggle.on('click', function() {
            smallnav.css('display', 'none');
            $('.body-background-overlay').removeClass('active');
        });

        adNavToggle.on('click', function(){
            if(adNavToggle.hasClass('active')){
                adNav.css('display', 'none');
                adNavToggle.removeClass('active');
            }else{
                adNavToggle.addClass('active');
                adNav.css('display', 'block');
            }
        });

        adNavXToggle.on('click', function(){
            adNav.css('display', 'none');

            if(adNavToggle.hasClass('active')){
                adNavToggle.removeClass('active');
            }else{
                adNavToggle.addClass('active');
            }
        });

    }
    function upBtn(){
        var upBtn = $('.up');
    
        $(window).scroll(function() {
        if($(window).scrollTop() > 500) {
                upBtn.addClass('show');
            }else {
                upBtn.removeClass('show');
            }
        });
        
        upBtn.on('click', function(e){
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0}, '300');
        });
    }
    function jQueryUI(){
        $('.search-item-wrapper .month').selectmenu();
        $('.intro-main-searchtour-item .duration, .search-item-wrapper .duration').selectmenu();
        $('.intro-main-searchtour-item .destination, .search-item-wrapper .destination').selectmenu();
        $('.availability input').datepicker();
        $('.rooms-number select').selectmenu();
        $('.rooms-number select').selectmenu();
        $('.rooms select, .validation .category_id select, .validation .destination_id select').selectmenu();
    }
    function ratingSelect(){
       var selectStar = $('.search-item-wrapper.rating i, .write-review-rating i');
       var selectedStars = $('.top-tourpackages .rating i, .all-tourpackages .rating i, .tour-rating i, .review-rating i');
       var count = 0;
       var rating = $('.rating input');

       selectStar.on('click', function(){
            var value = $(this).data('value');
            var actives = $(this).parent().children('i.active');

            console.log(value);

            rating.val(value);

            for(var i = 0; i < actives.length; i++){
                $(selectStar[i]).removeClass('active');
            }
             
            for(var i = 0; i < value; i++){
                $(selectStar[i]).addClass('active');
            }
        });

        for(var i = 0; i < selectedStars.length; i++){
            if($(selectedStars[i]).hasClass('half-active')){
                $(selectedStars[i]).toggleClass('fa-star fa-star-half-alt');
            }
        }

        for(var i = 0; i < selectedStars.length; i++){
            if($(selectedStars[i]).hasClass('active')){
                count += 1;
            }
        }
        
        rating.val(count);
  
    }
    function activateTypeFilter(){
        var optionsToggle = $('.tours-wrapper .type-filter header i');
        var items = $('.tours-wrapper .type-filter .search-item');
        
        optionsToggle.click('on', function(){
            if(!items.hasClass('active')){
                optionsToggle.toggleClass("fas fa-plus fas fa-minus");
                items.slideToggle();
            }else{
                optionsToggle.toggleClass("fas fa-minus fas fa-plus");
                items.slideToggle();
            }
        });
    }
    function seePassword(){
        var passInput = $('.validation .password input');
        var passIcon = $('.validation .password i');
        
        passIcon.on('click', function(){
            if(passInput.attr('type') == 'text'){
                passIcon.toggleClass('fa-eye-slash fa-eye');
                passInput.prop('type', 'password');
            }else{
                passIcon.toggleClass('fa-eye fa-eye-slash');
                passInput.prop('type', 'text');
            }
        });
    }
    function activateRoomNumber(){
        var numbers = $('.booking-container .rooms-number select');
        var rooms = $('.booking-container .rooms');

        numbers.on('selectmenuchange', function() {
            var selectedOption = $(this).find('option:selected').text();
            
            if(selectedOption != 'Number of rooms'){
                rooms.empty();
            
                for(var i = 1; i <= selectedOption; i++){
                    rooms.append('<div class="room">'+ translations.room +' <span>' + i + '</span><select name="room-adult"><option value="">'+ translations.adult +'</option><option value="">1</option><option value="">2</option><option value="">3</option><option value="">4</option><option value="">5</option></select><select name="room-child"><option value="">'+ translations.child +'</option><option value="">1</option><option value="">2</option><option value="">3</option><option value="">4</option><option value="">5</option></select></div>');
                    $('.rooms select').selectmenu();
                }
                
                rooms.slideDown('slow');
            }else{
                rooms.slideToggle('slow');
            }
        });
    }
    function flashMessage(){
        $notify = $('.success-msg, .error-msg').css('display', 'block').addClass('animate__fadeInRight');

        setTimeout(function(){
            $notify.removeClass('animate__fadeInRight').addClass('animate__fadeOut');
        }, 5000);
    }
    function hasErrors(){
        var errorLine = $('form.validation .has-error input, form.validation .has-error textarea');
        
        errorLine.on('change paste keyup', function(){
            if($(this).val()){
                $(this).css('border-color', '#8bc34a');
                if($(this).attr('type') == 'password'){
                    $(this).parent().parent().parent().find('.error-message').css('display', 'none')[0];
                }else{
                    $(this).parent().parent().find('.error-message').css('display', 'none')[0];
                }
            }else{
                $(this).css('border-color', '#ff3333');
                if($(this).attr('type') == 'password'){
                    $(this).parent().parent().parent().find('.error-message').css('display', 'block')[0];
                }else{
                    $(this).parent().parent().find('.error-message').css('display', 'block')[0];
                }
            }
        });
    }
    function submitDevare(){
        $('.del-btn, .del-avatar-btn, .delete').on('click', function(e){
            var form = $(this).closest('form');
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    }
    function activateDaysNumber(){
        var numbers = $('.validation .days-count input');

        numbers.attr('value', '1');

        var numbersVal = numbers.val();
        var numbEdit = $('.validation .days-count-edit input');
        var numbEditVal = numbEdit.val();
        var days = $('.validation .days');

        numbEditValArr = [numbEditVal];
        numbersValArr = [numbersVal];

        numbers.on('change', function(){
            var selected = numbers.val();

            if(selected != 0){
                $('.validation .days div').slice(numbersValArr[0] * 4).remove();
                for(var i = 2; i <= selected; i++){
                    days.append('<div class="daytitle'+ i +'_en"><label>Day ' + i + ' Title EN <input type="text" name="daytitle'+ i +'_en"></label></div><div class="daydescr'+ i +'_en"><label>Day ' + i + ' Descr EN <textarea name="daydescr'+ i +'_en"></textarea></label></div><div class="daytitle'+ i +'_am"><label>Day ' + i + ' Title AM <input type="text" name="daytitle'+ i +'_am"></label></div><div class="daydescr'+ i +'_am"><label>Day ' + i + ' Descr AM <textarea name="daydescr'+ i +'_am"></textarea></label></div>');
                }
                
                days.slideDown('slow');
            }else{
                days.slideToggle('slow');
            }
        });

        numbEdit.on('change', function(){ 
            var selected = numbEdit.val();

            numbEditVal = parseInt(numbEditValArr[0])+1;

            if(selected != 0){
                $('.validation .days div').slice(numbEditVal * 3).remove();
                for(var i = numbEditVal; i <= $(this).val(); i++){
                    days.append('<div class="daytitle'+ i +'_en"><label>Day ' + i + ' Title EN <input type="text" name="daytitle'+ i +'_en"></label></div><div class="daydescr'+ i +'_en"><label>Day ' + i + ' Descr EN <textarea name="daydescr'+ i +'_en"></textarea></label></div><div class="daytitle'+ i +'_am"><label>Day ' + i + ' Title AM <input type="text" name="daytitle'+ i +'_am"></label></div><div class="daydescr'+ i +'_am"><label>Day ' + i + ' Descr AM <textarea name="daydescr'+ i +'_am"></textarea></label></div>');
                }
                days.slideDown('slow');
            }else{
                days.slideToggle('slow');
            }
        });
    }
    function navTourHeight(){
        var height = $('.main-nav').outerHeight();
        
        $('.nav-tour').css('top', height);
    }
    function reviewActions(){
        var actionsIcon = $('.review-actions-icon i');
        var actions = $('.review-actions');

        actionsIcon.on('click', function(){
            if(actions.hasClass('active')){
                actions.removeClass('active');
            }else{
                actions.addClass('active');
            }
        });
    }
})