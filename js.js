$(document).ready(function () {

    $(".dropdown").click(function () {

        $(this).addClass("open");

    });

    $(".dropdown").mouseleave(function () {

        $(this).removeClass("open");

    });

    if (window.location.href.indexOf("dashboard") > -1) {

        $("#dashboardH").addClass("active");

    } else if (window.location.href.indexOf("tasks") > -1) {

        $("#noteH").addClass("active");

    } else if (window.location.href.indexOf("blogs") > -1) {

        $("#noteH").addClass("active");

    } else if (window.location.href.indexOf("customweb") > -1) {

        $("#noteH").addClass("active");

    } else if (window.location.href.indexOf("contentbuilder") > -1) {

        $("#autobuilderH").addClass("active");

    } else if (window.location.href.indexOf("designbuilder") > -1) {

        $("#autobuilderH").addClass("active");

    } else if (window.location.href.indexOf("devbuilder") > -1) {

        $("#autobuilderH").addClass("active");

    } else if (window.location.href.indexOf("admin") > -1) {

        $("#userH").addClass("active");

    } else if (window.location.href.indexOf("suggestion") > -1) {

        $("#userH").addClass("active");

    } else if (window.location.href.indexOf("onsiteqa") > -1) {

        $("#noteH").addClass("active");

    }

    //Admin panel buttons
    $(".btn-group").on("click", function () {

        if ($(this).hasClass("open")) {
            $(this).removeClass("open");
        } else {

            $(this).addClass("open");
        }

    });


    // Below is the code for the plus button on custom web form
    $("#plus1").click(function () {

        $('#subItem2').css("display", "block");
        $('#plus1').css("visibility", "hidden");

    });


    $("#plus2").click(function () {

        $('#subItem3').css("display", "block");
        $('#plus2').css("visibility", "hidden");

    });

    $("#plus3").click(function () {

        $('#subItem4').css("display", "block");
        $('#plus3').css("visibility", "hidden");

    });

    $("#plus4").click(function () {

        $('#subItem5').css("display", "block");
        $('#plus4').css("visibility", "hidden");

    });

    $("#plus5").click(function () {

        $('#subItem6').css("display", "block");
        $('#plus5').css("visibility", "hidden");

    });

    $("#plus6").click(function () {

        $('#subItem7').css("display", "block");
        $('#plus6').css("visibility", "hidden");

    });

    $("#plus7").click(function () {

        $('#subItem8').css("display", "block");
        $('#plus7').css("visibility", "hidden");

    });

    $("#plus8").click(function () {

        $('#subItem9').css("display", "block");
        $('#plus8').css("visibility", "hidden");

    });

    $("#plus9").click(function () {

        $('#subItem10').css("display", "block");
        $('#plus9').css("visibility", "hidden");

    });

    $("#plus10").click(function () {

        $('#subItem11').css("display", "block");
        $('#plus10').css("visibility", "hidden");

    });

    $("#plus11").click(function () {

        $('#subItem12').css("display", "block");
        $('#plus11').css("visibility", "hidden");

    });

    $("#plus12").click(function () {

        $('#subItem13').css("display", "block");
        $('#plus12').css("visibility", "hidden");

    });

    $("#plus13").click(function () {

        $('#subItem14').css("display", "block");
        $('#plus13').css("visibility", "hidden");

    });

    $("#plus14").click(function () {

        $('#subItem15').css("display", "block");
        $('#plus14').css("visibility", "hidden");
        $('#plus15').css("visibility", "hidden");

    });

    //code below adds total time up
    $(".sTime").focusout(function () {

        var sum = 0;

        $('.sTime').each(function () {
            sum += Number($(this).val());
        });

        $('#totalTime').val(sum);

    });

    //code below is for displaying forms clicked.
    $("#customIcon").click(function () {

        $('#customCon').css("display", "block");
        $('#formPH').css("display", "none");

    });

    $("#blogsIcon").click(function () {

        $('#blogsCon').css("display", "block");
        $('#formPH').css("display", "none");

    });

    $("#onsiteIcon").click(function () {

        $('#onsiteCon').css("display", "block");
        $('#formPH').css("display", "none");

    });


    //Custom web subtask display
    $("#subTasksIcon").click(function () {

        $('#subTasks').css("display", "block");

    });

    // CONTENT FORM
    $("#next1").click(function () {

        $('#contentp1').css("display", "none");
        $('#contentp2').css("display", "block");
        $('#contentp3').css("display", "none");
        $('#contentp4').css("display", "none");


        $('#step1').css("opacity", ".5");
        $('#step2').css("opacity", "1");
    });

    $("#next2").click(function () {

        $('#contentp1').css("display", "none");
        $('#contentp2').css("display", "none");
        $('#contentp3').css("display", "block");
        $('#contentp4').css("display", "none");

        $('#step2').css("opacity", ".5");
        $('#step3').css("opacity", "1");

    });

    $("#next3").click(function () {

        $('#contentp1').css("display", "none");
        $('#contentp2').css("display", "none");
        $('#contentp3').css("display", "none");
        $('#contentp4').css("display", "block");

        $('#step3').css("opacity", ".5");
        $('#step4').css("opacity", "1");

    });

    $("#step1").click(function () {

        $('#contentp1').css("display", "block");
        $('#contentp2').css("display", "none");
        $('#contentp3').css("display", "none");
        $('#contentp4').css("display", "none");

        $('#step1').css("opacity", "1");
        $('#step2').css("opacity", ".5");
        $('#step3').css("opacity", ".5");
        $('#step4').css("opacity", ".5");

    });

    // PREVIOUS BUTTONS


    $("#prev2").click(function () {

        $('#contentp1').css("display", "block");
        $('#contentp2').css("display", "none");
        $('#contentp3').css("display", "none");
        $('#contentp4').css("display", "none");

        $('#step2').css("opacity", ".5");
        $('#step1').css("opacity", "1");

    });

    $("#prev3").click(function () {

        $('#contentp1').css("display", "none");
        $('#contentp2').css("display", "block");
        $('#contentp3').css("display", "none");
        $('#contentp4').css("display", "none");

        $('#step3').css("opacity", ".5");
        $('#step2').css("opacity", "1");

    });

    $("#prev4").click(function () {

        $('#contentp1').css("display", "none");
        $('#contentp2').css("display", "none");
        $('#contentp3').css("display", "block");
        $('#contentp4').css("display", "none");

        $('#step1').css("opacity", ".5");
        $('#step2').css("opacity", ".5");
        $('#step3').css("opacity", "1");
        $('#step4').css("opacity", ".5");

    });

    // STEP IMAGES

    $("#step2").click(function () {

        $('#contentp1').css("display", "none");
        $('#contentp2').css("display", "block");
        $('#contentp3').css("display", "none");
        $('#contentp4').css("display", "none");

        $('#step1').css("opacity", ".5");
        $('#step2').css("opacity", "1");
        $('#step3').css("opacity", ".5");
        $('#step4').css("opacity", ".5");

    });

    $("#step3").click(function () {

        $('#contentp1').css("display", "none");
        $('#contentp2').css("display", "none");
        $('#contentp3').css("display", "block");
        $('#contentp4').css("display", "none");

        $('#step1').css("opacity", ".5");
        $('#step2').css("opacity", ".5");
        $('#step3').css("opacity", "1");
        $('#step4').css("opacity", ".5");

    });

    $("#step4").click(function () {

        $('#contentp1').css("display", "none");
        $('#contentp2').css("display", "none");
        $('#contentp3').css("display", "none");
        $('#contentp4').css("display", "block");

        $('#step1').css("opacity", ".5");
        $('#step2').css("opacity", ".5");
        $('#step3').css("opacity", ".5");
        $('#step4').css("opacity", "1");

    });

    // TINY MCE STUFF
    $('.edit_link').css("visibility", "hidden");
    $('.ctextarea').focus(function () {
        $('.edit_link').css("visibility", "hidden");
        $(this).siblings('.edit_link').css("visibility", "visible");
    });

    $('.edit_link').click(function () {
        $('.ctextarea').removeClass('currentcontent');
        $(this).siblings('.ctextarea').addClass('currentcontent');
        var content = $(this).siblings('.ctextarea').val();
        $('#edit_wrap').show();
        $('.overlay').show();
        $('.left-wrapper').css('-webkit-filter', 'blur(2px)');
        $('.right-wrapper').css('-webkit-filter', 'blur(2px)');
        $('.lSide').css('-webkit-filter', 'blur(2px)');
        $('.navbar').css('-webkit-filter', 'blur(2px)');

        tinyMCE.activeEditor.setContent(content);
    });

    $('.close').click(function () {
        var newcontent = tinyMCE.activeEditor.getContent();
        $('#edit_wrap').hide();
        $('.overlay').hide();
        $('.currentcontent').val(newcontent);
        $('.left-wrapper').css('-webkit-filter', 'blur(0px)');
        $('.right-wrapper').css('-webkit-filter', 'blur(0px)');
        $('.lSide').css('-webkit-filter', 'blur(0px)');
        $('.navbar').css('-webkit-filter', 'blur(0px)');
    });

    if (window.location.href.indexOf("designbuilder") > -1) {
        $(function () {
            Dropzone.options.dropzoneForm = {
                init: function () {
                    this.on("complete", function () {
                        if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                            if ($.trim($('#image_error').text()).length === 0) {
                                //location.reload();
                            } else {
                                $('#image_error').show();
                            }
                            //$('#upload_wrap').hide();
                        }
                    });
                },
                success: function(file, response) {
                    if (response == 'success') {
                        file.previewElement.classList.add('dz-success');
                        file.previewElement.classList.remove('dz-processing');

                    } else {
                        file.previewElement.classList.add('dz-error');
                        file.previewElement.classList.remove('dz-processing');
                        $('#image_error').append(response);
                    }
                }
            };
        });
    }

    $("#domain").focusout(function() {
        var textbox = $(this);
        if (textbox.val().substring(0, 4) == "http" || textbox.val().substring(0, 4) == "www.") {
            if (textbox.val().indexOf("https://www.") === 0) {
                textbox.val(textbox.val().substring(12));
            }
            if (textbox.val().indexOf("http://www.") === 0) {
                textbox.val(textbox.val().substring(11));
            }
            if (textbox.val().indexOf("https://") === 0) {
                textbox.val(textbox.val().substring(8));
            }
            if (textbox.val().indexOf("http://") === 0) {
                textbox.val(textbox.val().substring(7));
            }
            if (textbox.val().indexOf("www.") === 0) {
                textbox.val(textbox.val().substring(4));
            }

        }

        var someString = $(this).val();
        someString = someString.replace(/\//g, "");
        textbox.val(someString);
    });

    $("#onsiteDomain").on("keyup", function() {
  
        var textbox = $(this);
        if (textbox.val().substring(0, 4) == "http" || textbox.val().substring(0, 4) == "www.") {
            if (textbox.val().indexOf("https://www.") === 0) {
                textbox.val(textbox.val().substring(12));
            }
            if (textbox.val().indexOf("http://www.") === 0) {
                textbox.val(textbox.val().substring(11));
            }
            if (textbox.val().indexOf("https://") === 0) {
                textbox.val(textbox.val().substring(8));
            }
            if (textbox.val().indexOf("http://") === 0) {
                textbox.val(textbox.val().substring(7));
            }
            if (textbox.val().indexOf("www.") === 0) {
                textbox.val(textbox.val().substring(4));
            }

        }

        textbox = textbox.val().replace(new RegExp(/\/(.*)/),"");

        $(this).val(textbox);

    });

    $("#domain").on("keyup", function() {
        var textbox = $(this);
        if (textbox.val().substring(0, 4) == "http" || textbox.val().substring(0, 4) == "www.") {
            if (textbox.val().indexOf("https://www.") === 0) {
                textbox.val(textbox.val().substring(12));
            }
            if (textbox.val().indexOf("http://www.") === 0) {
                textbox.val(textbox.val().substring(11));
            }
            if (textbox.val().indexOf("https://") === 0) {
                textbox.val(textbox.val().substring(8));
            }
            if (textbox.val().indexOf("http://") === 0) {
                textbox.val(textbox.val().substring(7));
            }
            if (textbox.val().indexOf("www.") === 0) {
                textbox.val(textbox.val().substring(4));
            }

        }

        var someString = $(this).val();
        someString = someString.replace(/\//g, "");
        textbox.val(someString);
    });

    $('#button_id').on('click', function() {
        var domain_data = $(this).attr('data-domain');
        var wireframe_data = $(this).attr('data-wireframe');
        var altText = {};
        $('.alttext').each(function() {
            var altKey = $(this).attr('id');
            altText[altKey] = $(this).val();
        });
        $.post('dropzone/imagehandler.php', {
            domain: domain_data,
            wireframe: wireframe_data,
            alttext: altText
        }, function(data) {
            $("#button_id").html(data);
            $("#button_id").attr("disabled", true);
        });

    });

    $('.submitCon').bind("keyup keypress", function(e) {

        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        }
    });

    $('.submit-button').bind("keyup keypress", function(e) {

        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        }
    });


    $('#devMode').change(function () {
        if ($(this).attr('devmode')){
            $(this).removeAttr('devmode', 'true');
        } else {
            $(this).attr('devmode', 'true');
        }
    });

     
    
        // FORM VALIDATION
        $('.validation').focus(function () {
            if (!$('#devMode').attr('devmode')){
            $(".validation").tooltip();

            $(this).keyup(function(e) {

                var sspace = $(this).val().replace(/ +/g, ' ');

                if ($(this).val() != sspace) {
                    $(this).val(sspace);
                }

                var count = $(this).val().length;
                var min = $(this).attr('data-min');
                var max = $(this).attr('data-max');

                if (count < min || count > max) {
                    $(this).attr('data-valid', 'invalid');
                    $(this).addClass('has-error');
                    $(this).removeClass('has-success');

                } else {
                    $(this).attr('data-valid', 'valid');
                    $('.charcount').html('');
                    $(this).removeClass('has-error');
                    $(this).addClass('has-success');

                    $(this).removeAttr('data-placement'); 
                    $(this).attr('data-original-title', 'Correct Character Count');
                }

                if (count < min) {

                    var characterCount = ('Characters: ' + count + ' (' + min + ' to ' + max + ')');
                    $(this).attr('data-placement', 'top'); 
                    $(this).attr('data-original-title', characterCount);



                }

                if (count > max) {

                    var maxcharCount = ('Characters: ' + count + ' (' + min + ' to ' + max + ')');
                    $(this).attr('data-placement', 'top'); 
                    $(this).attr('data-original-title', maxcharCount);
                }

            });
            }
        });
    

    $('.btn-valid').hide();
    var y = 0;

    if (window.location.href.indexOf("contentbuilder") > -1) {
        window.setInterval(function () {
            if (!$('#devMode').attr('devmode')){
                    var all = document.getElementsByClassName("validation").length;

                    $(".validation").each(function() {

                        if ($(this).attr('data-valid') == 'valid') {

                                y++;

                            } else {
                                y = 0;
                                $('.btn-valid').fadeOut(400);
                            }

                            if (y >= all) {

                                $('.btn-valid').fadeIn(400);

                            }

                    });
            } else {
                $('.btn-valid').fadeIn(400);
            }
        }, 3000);        
    }

    //Adding up the three page titles
    $('.validation').keyup(function() {
        if (!$('#devMode').attr('devmode')){
            if ($("#Page_1").length) {
                var count = $('#Page_1').val().length;
                var count1 = $('#Page_2').val().length;
                var count2 = $('#Page_3').val().length;

                var sum = count + count1 + count2;

                if (sum > 1 && sum <= 90) {
                    $('#Page_1').attr('data-valid', 'valid');
                    $('#Page_2').attr('data-valid', 'valid');
                    $('#Page_3').attr('data-valid', 'valid');

                    $('#Page_1').removeClass('has-error');
                    $('#Page_2').removeClass('has-error');
                    $('#Page_3').removeClass('has-error');
                    $('#Page_1').addClass('has-success');
                    $('#Page_2').addClass('has-success');
                    $('#Page_3').addClass('has-success');

                } else {
                    $('#Page_1').attr('data-valid', 'invalid');
                    $('#Page_2').attr('data-valid', 'invalid');
                    $('#Page_3').attr('data-valid', 'invalid');

                    $('#Page_1').addClass('has-error');
                    $('#Page_2').addClass('has-error');
                    $('#Page_3').addClass('has-error');
                    $('#Page_1').removeClass('has-success');
                    $('#Page_2').removeClass('has-success');
                    $('#Page_3').removeClass('has-success');
                }
            }
        }
    });
    


    if (window.location.href.indexOf("designbuilder") > -1) {
        window.setInterval(function() {

            var all = document.getElementsByClassName("validation").length;

            $(".validation").each(function() {

                if ($(this).attr('data-valid') == 'valid') {

                    y++;

                } else {
                    y = 0;
                    $('.btn-valid').fadeOut(400);
                }

                if (y >= all) {

                    $('.btn-valid').fadeIn(400);

                }
            });
        }, 3000);
    }


    //Removing microsoft word rich text formatting 
    $('.validation').focusout(function() {

        str = $(this).val();
        var textbox = $('.validation');

        // vertical pipe
        //str = str.replace (/\u007C/g, "\$");
        // smart single quotes and apostrophe
        str = str.replace(/[\u2018|\u2019|\u201A]/g, "\'");
        // smart double quotes
        str = str.replace(/[\u201C|\u201D|\u201E]/g, "\"");
        // ellipsis
        str = str.replace(/\u2026/g, "...");
        // dashes
        str = str.replace(/[\u2013|\u2014]/g, "-");
        // circumflex
        str = str.replace(/\u02C6/g, "^");
        // open angle bracket
        str = str.replace(/\u2039/g, "<");
        // close angle bracket
        str = str.replace(/\u203A/g, ">");
        //  spaces
        str = str.replace(/[\u02DC|\u00A0]/g, " ");
        $(this).val(str);
        	if ($(this).attr("id") == "title_tag"){
        		newString = str.replace ("'", "|", $(this).val());
        		$(this).val(newString);
        	}

    });

    $('#autofill').on('click', function() {
        $('.validation').each(function() {
            var lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
            var min = $(this).attr('data-min') - 5;
            var max = $(this).attr('data-max') - 5;
            var contentLength = Math.floor((Math.random() * max) + min);
            var loremArr = lorem.split(' ');
            var fillerText = "Lorem ipsum dolor sit amet,";
            for (var i = 0; i < contentLength; i++) {
                var randInt = Math.floor((Math.random() * loremArr.length) + 10);
                fillerText += ' ' + loremArr[randInt];
            }
            $(this).val(fillerText.substr(0, max - 5));
        });
    });

    $(".show-this1").click(function() {
        $(".quicktime").val("0.1");
    });
    $(".show-this2").click(function() {
        $(".quicktime").val("0.25");
    });
    $(".show-this3").click(function() {
        $(".quicktime").val("0.5");
    });
    $(".show-this4").click(function() {
        $(".quicktime").val("0.75");
    });
    $(".show-this5").click(function() {
        $(".quicktime").val("1");
    });

    $("#accAlert").hide();

    $(".userTable").focusout(function() {


        var ID = $(this).attr("id");
        var firstname = $("#firstname" + ID).text();
        var lastname = $("#lastname" + ID).text();
        var email = $("#email" + ID).text();
        var role = $("#role" + ID).val();
        var status = $("#status" + ID).val();
        var manager = $("#manager" + ID).is(':checked');
        var dataString = 'user_id=' + ID + '&first_name=' + firstname + '&last_name=' + lastname + '&email=' + email + '&role=' + role + '&status=' + status + '&manager=' + manager;

        if (firstname.length > 0 && lastname.length > 0 && email.length > 0) {

            $.ajax({
                type: "POST",
                url: "login/users_edit.php",
                data: dataString,
                cache: false,
                success: function(html) {
                    $("#firstname" + ID).text(firstname);
                    $("#lastname" + ID).text(lastname);
                    $("#email" + ID).text(email);
                    $("#selectedOne" + ID).text(status);

                    $("#accAlert").html("<b>Update:</b> User " + firstname + " has been updated!");
                    $("#accAlert").fadeIn(600).delay(1500).fadeOut(600);
                }
            });
        }

    });

    $(".userTable2").focusout(function() {

        var ID = $(this).attr("id");
        var comment = $("#comment" + ID).text();
        var status = $("#status" + ID).val();
        var username = $("#userValue").val();

        var dataString = 'id=' + ID + '&comment=' + comment + '&status=' + status + '&username=' + username;

        $.ajax({
            type: "POST",
            url: "task/onsiteh.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#comment" + ID).text(comment);
                $("#status" + ID).val(status);
                window.location.href = "onsiteqa.php#btn1";
                location.reload();
            }
        });
        

    });

    $(".userTable5").focusout(function() {

        var ID = $(this).attr("id");
        var comment = $("#scomment" + ID).text();
        var status = $("#sstatus" + ID).val();
        var dataString = 'id=' + ID + '&comment=' + comment + '&status=' + status;

        $.ajax({
            type: "POST",
            url: "task/onsiteKickback.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#scomment" + ID).text(comment);
                $("#sstatus" + ID).val(status);
                window.location.href = "onsiteqa.php#btn3";
                location.reload();
            }
        });
        
    });

    $(".userTable6").focusout(function() {

        var ID = $(this).attr("id");
        var clientid = $("#clientid" + ID).text();
        var task = $("#task" + ID).text();
        var domain = $("#domain" + ID).text();
        var hstatus = $("#hstatus" + ID).text();
        var comment = $("#hcomment" + ID).text();
        var time = $("#time" + ID).text();

        var dataString = 'id=' + ID + '&comment=' + comment + '&status=' + hstatus + '&domain=' + domain + '&task=' + task + '&clientid=' + clientid + '&time=' + time;

        $.ajax({
            type: "POST",
            url: "task/onsitep.php",
            data: dataString,
            cache: false,
            success: function(html) {

                $("#clientid" + ID).text(clientid);
                $("#hstatus" + ID).text(hstatus);
                $("#task" + ID).text(task);
                $("#domain" + ID).text(domain);
                $("#time" + ID).text(time);
                $("#sstatus" + ID).val(status);

            }
        });
        
    });



    var blogsView = function () {

        $(".blogticketPanel").css('display', 'block');
        $(".adminPanel").css('display', 'none');
        $("#newUser").css('display', 'none');
        $("#userbtn3").addClass("active");
        $("#userbtn1").removeClass("active");
        $("#userbtn2").removeClass("active");
        $("#userbtn4").removeClass("active");
        $(".yourtasklist").css('display', 'none');

    };

    var taskList = function () {

        $(".blogticketPanel").css('display', 'none');
        $(".adminPanel").css('display', 'none');
        $("#newUser").css('display', 'none');
        $("#userbtn3").removeClass("active");
        $("#userbtn1").removeClass("active");
        $("#userbtn2").removeClass("active");
        $("#userbtn4").addClass("active");
        $(".yourtasklist").css('display', 'block');

    };

     var reportPage = function () {

        $(".blogticketPanel").css('display', 'none');
        $(".adminPanel").css('display', 'none');
        $("#newUser").css('display', 'none');
        $("#userbtn3").removeClass("active");
        $("#userbtn1").removeClass("active");
        $("#userbtn2").removeClass("active");
        $("#userbtn4").removeClass("active");
        $(".yourtasklist").css('display', 'none');
        $("#userbtn5").addClass("active")
        $(".container5").css('display', 'block');

    };

    if (window.location.href.indexOf("btn3") > -1) {

        blogsView();
    }

    if (window.location.href.indexOf("btn4") > -1) {

        taskList();
    }

     if (window.location.href.indexOf("btn5") > -1) {

        reportPage();
    }

    $("#userbtn1").on('click', function() {

        $(".adminPanel").css('display', 'block');
        $("#newUser").css('display', 'none');
        $(".blogticketPanel").css('display', 'none');
        $("#userbtn1").addClass("active");
        $("#userbtn2").removeClass("active");
        $("#userbtn3").removeClass("active");
        $("#userbtn4").removeClass("active");
        $(".yourtasklist").css('display', 'none');
        $(".container5").css('display', 'none');
        $("#userbtn5").removeClass("active")

    });


    $("#userbtn2").on('click', function() {

        $(".adminPanel").css('display', 'none');
        $("#newUser").css('display', 'block');
        $(".blogticketPanel").css('display', 'none');
        $("#userbtn2").addClass("active");
        $("#userbtn1").removeClass("active");
        $("#userbtn3").removeClass("active");
        $("#userbtn4").removeClass("active");
        $(".yourtasklist").css('display', 'none');
        $(".container5").css('display', 'none');
        $("#userbtn5").removeClass("active")

    });

    $("#userbtn3").on('click', function() {

        $(".blogticketPanel").css('display', 'block');
        $(".adminPanel").css('display', 'none');
        $("#newUser").css('display', 'none');
        $("#userbtn3").addClass("active");
        $("#userbtn1").removeClass("active");
        $("#userbtn2").removeClass("active");
        $("#userbtn4").removeClass("active");
        $(".yourtasklist").css('display', 'none');
        $(".container5").css('display', 'none');
        $("#userbtn5").removeClass("active")


    });

    $("#userbtn4").on('click', function() {

        $(".blogticketPanel").css('display', 'none');
        $(".adminPanel").css('display', 'none');
        $("#newUser").css('display', 'none');
        $("#userbtn3").removeClass("active");
        $("#userbtn1").removeClass("active");
        $("#userbtn2").removeClass("active");
        $("#userbtn4").addClass("active");
        $(".container5").css('display', 'none');
        $(".yourtasklist").css('display', 'block');
        $("#userbtn5").removeClass("active")
    });

    $("#userbtn5").on('click', function() {

        $(".blogticketPanel").css('display', 'none');
        $(".adminPanel").css('display', 'none');
        $("#newUser").css('display', 'none');
        $("#userbtn3").removeClass("active");
        $("#userbtn1").removeClass("active");
        $("#userbtn2").removeClass("active");
        $("#userbtn4").removeClass("active");
        $(".yourtasklist").css('display', 'none');
        $("#userbtn5").addClass("active")
        $(".container5").css('display', 'block');

    });


    $("#forgot1").click(function() {

        $("#RegisterBox1").css('display', 'none');
        $("#RegisterBox2").css('display', 'block');
    });

    $("#forgot2").click(function() {

        $("#RegisterBox2").css('display', 'none');
        $("#RegisterBox3").css('display', 'none');
        $("#RegisterBox1").css('display', 'block');
    });

    $("#forgot6").click(function() {

        $("#RegisterBox2").css('display', 'none');
        $("#RegisterBox3").css('display', 'none');
        $("#RegisterBox1").css('display', 'block');
    });

    $("#newUserLink").click(function() {

        $("#RegisterBox2").css('display', 'none');
        $("#RegisterBox1").css('display', 'none');
        $("#RegisterBox3").css('display', 'block');
    });

    $("#loginSub2").click(function(e) {

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'login/forgotpassword.php',
            data: $("#login2").serialize(),
            success: function(e) {
                $("#emailmessage").html(e);
            }

        });
        return false;
    });


    $("#loginSub").click(function(e) {

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'login/login.php',
            data: $("#login").serialize(),
            success: function(e) {

                if (e == true) {
                    window.location.href = "dashboard.php";
                } else {
                    $("#loginMessage").html(e);
                }

            }


        });
        return false;
    });

    $("#loginSub4").click(function(e) {

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'login/registration.php',
            data: $("#registrationForm").serialize(),
            success: function(e) {

                $("#loginMessage2").html(e);

            }


        });
        return false;
    });


    // These functions control the progress bar on contentbuilder
    if (window.location.href.indexOf("contentbuilder") > -1) {
        var progress = 0;
        $(".validation").each(function() {

            ++progress;

        });

        var totalProgress = 0;


        window.setInterval(function() {

            var totalProgress = 0;
            $("[data-valid='valid'").each(function() {

                ++totalProgress;

            }); 

            var sum = totalProgress / progress;
            var endProgress = sum * 100;
            $("#formProgress").css("width", endProgress + "%");
            $("#formProgress").text(Math.round(endProgress / 1) + "%");
            if (endProgress == 100) {

                $("#formProgress").addClass('progress-bar-success');
                $("#formProgress").removeClass('active');
                $("#formProgress").removeClass('progress-bar-striped');

            } else {

                $("#formProgress").removeClass('progress-bar-success');
                $("#formProgress").addClass('active');
                $("#formProgress").addClass('progress-bar-striped');

            }
        }, 1000);
    }
	$('#contentSuccess').hide();
    if (window.location.href.indexOf("contentbuilder") > -1) {
    	
        $(".btn-valid").click(function(e) {

            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'dropzone/contenth.php',
                data: $("#wireframeForm").serialize(),
                success: function(e) {
                	$("#contentSuccess").fadeIn(800);
                	$("#contentSuccess").text(e);
                    $(".btn-valid").prop('disabled', "true");

                }

            });
            return false;
        });
    }

     if (window.location.href.indexOf("suggestion") > -1) {
        $("#suggestionSubmit").click(function(e) {

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'suggestionh.php',
                data: $("#suggestionForm").serialize(),
                success: function(e) {

                    $("#suggestionSubmit").val(e);
                    $("#suggestionSubmit").prop('disabled', "true");

                }
            });
            return false;
        });
    }

    $("#pageNext").click(function(e) {

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'admin.php',
            data: $("#blogsPagenation").serialize(),
            success: function() {

                blogsView();
            }


        });
        return false;
    });

    $("#pagePrevious").click(function(e) {

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'admin.php',
            data: $("#blogsPagenation2").serialize(),
            success: function() {

            }


        });
        return false;
    });

    if (window.location.href.indexOf("Next") > -1 || window.location.href.indexOf("Previous") > -1) {

            blogsView();

    }


    $(".sqlDelete").dblclick(function() {

        var ID = $(this).attr("id");
        var dataString = 'id=' + ID;

        $.ajax({
            type: "POST",
            url: "task/onsiteDelete.php",
            data: dataString,
            cache: false,
            success: function(html) {
               location.reload();
            }
        });
        
    });

    $("#graphDisplay1").on('click', function () {

        $("#graph2").css("display", "none");
        $("#graph1").css("display", "block");

        $(this).addClass("active");
        $("#graphDisplay2").removeClass("active");

    });

    $("#graphDisplay2").on('click', function () {

        $("#graph2").css("display", "block");
        $("#graph1").css("display", "none");

        $(this).addClass("active");
        $("#graphDisplay1").removeClass("active");

    });

    $("#plusDoc").click(function () {

        $("#docCon").append('<input type="text" class="sInputs doc" placeholder="Doc URL" name="doc[]" style="margin-left: 10px; width: 100%;" /> <br>');

    });

    $(".comHeight").hover(function (){

        var find = $(this);
        $(find).delay(700).animate({
            height: 200,
        }, 350);  
     
    });

     $(".comHeight").mouseleave(function (){

        var find = $(this);
         $(find).clearQueue();
        $(find).delay(500).animate({
            height: 32,
        }, 350);

    });

     $("#taskSelect").prop("selectedIndex", -1);
});













