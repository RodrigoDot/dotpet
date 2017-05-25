$(function() {
    
    console.log("j carregado");
    submitLogAtt();
    
    var idUsuario = $(".idUsuario").attr("id");
    var $destinatario = $(".destinatario").attr("id");
    
    function displayWarming() {
        var $exitBox = $("<div />").addClass("alert-danger")
            .append($("<p />").addClass("warning").text("Are you sure, you wanna get out ?"))
            .append($("<div />").addClass("btn-group")
            .append($("<input />").addClass("cancel btn btn-danger confirmButtons").val("Cancel"))
            .append($("<input />").addClass("confirm btn btn-primary confirmButtons").val("Confirm")));
        
        exitDisableButton();
        $("body").append($exitBox);
    }
 
    function submitMsg() {
        var clientMsg = $("#userMsg").val();
        if(!clientMsg) {
            return false;
        }else {
            $.post("messenger/post.php?destinatario=" + $destinatario + "", {text: clientMsg});
            $("#userMsg").val("");
            $("#userMsg").focus();
            submitLogAtt();
            return false;
        }
    }

    function loadLog(){	
        var oldScrollHeight = $("#chatbox").prop("scrollHeight"); 
        $.ajax({
            url: "messenger/loghistory/" + idUsuario + "/log" + idUsuario + $destinatario + ".html",
            cache: false,
            success: function(html){		
                $("#chatbox").html(html); 
                autoScroll(oldScrollHeight);
            },
        });
    }
    
    function submitLogAtt() { 
        console.log("att OK");
        $.post("messenger/loadLogHistory.php?destinatario=" + $destinatario + "", {text: ""} );
        console.log("att post OK");
        return false;
    }
  
    function loadLogHistory(){	
        var oldScrollHeight = $("#logHistoryBox").prop("scrollHeight"); 
        $.ajax({
            url: "messenger/loghistory/" + idUsuario + "/logHistory" + idUsuario + ".html",
            cache: false,
            success: function(html){		
                $("#logHistoryBox").html(html); 
            },
        });
    }
    
    function exitDisableButton() {
        $("#exit").hide();
    }
    
    function exitEnableButton() {
        $("#exit").show();
    }
     
    function autoScroll(scrollValue) {
        var newScrollHeight = $("#chatbox").prop("scrollHeight");
        if(scrollValue < newScrollHeight) {
            $("#chatbox").animate({ scrollTop: newScrollHeight }, 'fast');   
        }
    }
    
    $(document).on('click', '.cancel', function(){ 
        $(".alert-danger").remove();
        exitEnableButton();        
    });
    
    $(document).on('click', '.confirm', function(){ 
        window.location = "view/logout.php";  
    });
    
    //CHAMADAS DE EVENTOS
    
    setInterval (loadLog, 500);
    setInterval (submitLogAtt, 100);
    setInterval (loadLogHistory, 500);
    $("#exit").click(displayWarming);
    $("#submitMsg").click(submitMsg);
    $("#submitMsg").click(loadLog);
});




















