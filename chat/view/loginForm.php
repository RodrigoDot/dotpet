<?php
if(!isset($_SESSION))
    session_start();

function chatBox() {
    echo' 
    <main class="chatContainer">
        <aside id="asideLogHistory">
            <div class="topTitle"></div>
            <div id="logHistoryBox">';
    
        if(file_exists("messenger/log.html") && filesize("messenger/log.html") > 0) {
            $handle = fopen("messenger/log.html", "r");
            $contents = fread($handle, filesize("messenger/log.html"));
            fclose($handle);
            echo $contents;
        }                
            echo'</div>


        </aside> 

        <div id="wrapper" class="jumbotron">
            <div id="menu">
                <p class="welcome">Welcome, <b>' . $_SESSION["nomeUsuario"] . '</b></p>
                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                <div style="clear:both"></div>
            </div>         

            <div id="chatbox">';

      /*  if(file_exists("messenger/log.html") && filesize("messenger/log.html") > 0) {
            $handle = fopen("messenger/log.html", "r");
            $contents = fread($handle, filesize("messenger/log.html"));
            fclose($handle);
            echo $contents;
        }
*/
        echo'</div>
            <form id="chatForm" name="message" action="#">
                <input id="userMsg" class="userInput form-control" name="userMsg" type="text" size="63" placeholder="Type your text here" autofocus/>
                <input id="submitMsg" class="btn btn-block btn-primary" name="submitMsg" type="submit" value="Send" />
            </form>
        </div>
        '; 
} 

    chatBox();
    echo '<div class="clearBoth"></div>';
echo '</main>';
?>