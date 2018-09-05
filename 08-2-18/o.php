<html>
    <head>
        <title>Tic Tac Toe</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <table class="" id="table">
            <tr>
                <td id="c1" class="ho"></td>
                <td id="c2" class="ho"></td>
                <td id="c3" class="ho"></td>
            </tr>
            <tr>
                <td id="c4" class="ho"></td>
                <td id="c5" class="ho"></td>
                <td id="c6" class="ho"></td>
            </tr>
            <tr>
                <td id="c7" class="ho"></td>
                <td id="c8" class="ho"></td>
                <td id="c9" class="ho"></td>
            </tr>
        </table>
        <div id="final">
            <h3 id="win" class="hide">You Win!</h3>
            <h3 id="lose" class="hide">You Lose</h3>
            <h3 id="draw" class="hide">Draw</h3>
            <button id="again" class="hide" onclick="again()">Play Again</button>
        </div>
        <div id="opp">
            <p>You are playing against <b>'Player 1 Name'</b></p>
        </div>
        <script>
            var state=[0,0,0,0,0,0,0,0,0,0],over=0;
            var sessionID=1;
            function handlerx(){
                revealx(this.id);
            }
            function handlero(){
                revealo(this.id);
            }
            function enableEvents(){
                document.getElementById('c1').addEventListener("click", handlero);
                document.getElementById('c2').addEventListener("click", handlero);
                document.getElementById('c3').addEventListener("click", handlero);
                document.getElementById('c4').addEventListener("click", handlero);
                document.getElementById('c5').addEventListener("click", handlero);
                document.getElementById('c6').addEventListener("click", handlero);
                document.getElementById('c7').addEventListener("click", handlero);
                document.getElementById('c8').addEventListener("click", handlero);
                document.getElementById('c9').addEventListener("click", handlero);
            }
            function disableEvents(){
                document.getElementById('c1').removeEventListener("click", handlero);
                document.getElementById('c2').removeEventListener("click", handlero);
                document.getElementById('c3').removeEventListener("click", handlero);
                document.getElementById('c4').removeEventListener("click", handlero);
                document.getElementById('c5').removeEventListener("click", handlero);
                document.getElementById('c6').removeEventListener("click", handlero);
                document.getElementById('c7').removeEventListener("click", handlero);
                document.getElementById('c8').removeEventListener("click", handlero);
                document.getElementById('c9').removeEventListener("click", handlero);
            }
            function checkWin(){
                if( (state[1]+state[2]+state[3]==3) || (state[4]+state[5]+state[6]==3) || (state[7]+state[8]+state[9]==3) || (state[1]+state[4]+state[7]==3) || (state[2]+state[5]+state[8]==3) || (state[3]+state[6]+state[9]==3) || (state[1]+state[5]+state[9]==3) || (state[3]+state[5]+state[7]==3) ){

                    document.getElementById("table").classList.add('overlay');
                    over=1;
                    document.getElementById("lose").classList.remove('hide');
                    document.getElementById("again").classList.remove('hide');

                }else if( (state[1]+state[2]+state[3]==-3) || (state[4]+state[5]+state[6]==-3) || (state[7]+state[8]+state[9]==-3) || (state[1]+state[4]+state[7]==-3) || (state[2]+state[5]+state[8]==-3) || (state[3]+state[6]+state[9]==-3) || (state[1]+state[5]+state[9]==-3) || (state[3]+state[5]+state[7]==-3) ){

                    document.getElementById("table").classList.add('overlay');
                    over=1;
                    document.getElementById("win").classList.remove('hide');
                    document.getElementById("again").classList.remove('hide');
                }else if((state[1]!=0)&&(state[2]!=0)&&(state[3]!=0)&&(state[4]!=0)&&(state[5]!=0)&&(state[6]!=0)&&(state[7]!=0)&&(state[8]!=0)&&(state[9]!=0)){

                    document.getElementById("table").classList.add('overlay');
                    over=1;
                    document.getElementById("draw").classList.remove('hide');
                    document.getElementById("again").classList.remove('hide');
                }
            }
            function revealx(x){
                var t=document.getElementById(x);
                t.classList.add('x');
                t.classList.remove('hx');
                t.classList.remove('ho');
                var index=x.slice(1,2);
                index=parseInt(index);
                state[index]=1;
                checkWin();
                if(over==0){
                    enableEvents();
                }
            }
            function revealo(x){
                var t=document.getElementById(x);
                t.classList.add('o');
                t.classList.remove('hx');
                t.classList.remove('ho');
                var index=x.slice(1,2);
                index=parseInt(index);
                state[index]=-1;
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState==4&&this.status==200){   
                    }
                };
                xmlhttp.open("GET", "changeState.php?q="+x+"&id="+sessionID, true);
                xmlhttp.send();
                checkWin();
                disableEvents();
            }

            function checkState(){
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState==4&&this.status==200){
                        var lastId=this.responseText;
                        if(lastId=='0'){
                            reset();
                            return;
                        }
                        var index=lastId.slice(1,2);
                        index=parseInt(index);
                        if(state[index]==0){
                            revealx(lastId);
                        }
                    }
                };
                xmlhttp.open("GET", "getState.php?id="+sessionID, true);
                xmlhttp.send();
            }
            function reset(){
                document.getElementById('c1').classList.add('ho');
                document.getElementById('c1').classList.remove('x');
                document.getElementById('c1').classList.remove('o');
                document.getElementById('c2').classList.add('ho');
                document.getElementById('c2').classList.remove('x');
                document.getElementById('c2').classList.remove('o');
                document.getElementById('c3').classList.add('ho');
                document.getElementById('c3').classList.remove('x');
                document.getElementById('c3').classList.remove('o');
                document.getElementById('c4').classList.add('ho');
                document.getElementById('c4').classList.remove('x');
                document.getElementById('c4').classList.remove('o');
                document.getElementById('c5').classList.add('ho');
                document.getElementById('c5').classList.remove('x');
                document.getElementById('c5').classList.remove('o');
                document.getElementById('c6').classList.add('ho');
                document.getElementById('c6').classList.remove('x');
                document.getElementById('c6').classList.remove('o');
                document.getElementById('c7').classList.add('ho');
                document.getElementById('c7').classList.remove('x');
                document.getElementById('c7').classList.remove('o');
                document.getElementById('c8').classList.add('ho');
                document.getElementById('c8').classList.remove('x');
                document.getElementById('c8').classList.remove('o');
                document.getElementById('c9').classList.add('ho');
                document.getElementById('c9').classList.remove('x');
                document.getElementById('c9').classList.remove('o');
                state=[0,0,0,0,0,0,0,0,0,0];
                document.getElementById("table").classList.remove('overlay');
                over=0;
                disableEvents();
                document.getElementById("lose").classList.add('hide');
                document.getElementById("again").classList.add('hide');
                document.getElementById("win").classList.add('hide');
                document.getElementById("draw").classList.add('hide');
            }
            function again(){
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState==4&&this.status==200){ 
                    }
                };
                xmlhttp.open("GET", "again.php?id="+sessionID, true);
                xmlhttp.send();
            }
            setInterval(checkState, 2000);
        </script>
    </body>
</html>