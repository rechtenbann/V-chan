<style type="text/css">
#log {
	width:600px; 
	height:300px; 
	border:1px solid #7F9DB9; 
	overflow:auto;
}
</style>
<script type="text/javascript">
var socket;

function init() {
	var host = "ws://127.0.0.1:9000/echobot"; // SET THIS TO YOUR SERVER
	try {
		socket = new WebSocket(host);
		// log('WebSocket - status '+socket.readyState);
        log('Connecting... ');
		// socket.onopen    = function(msg) { 
		// 					   log("Welcome - status "+this.readyState); 
		// 				   };
		// socket.onmessage = function(msg) { 
		// 					   log("Received: "+msg.data); 
		// 				   };
		// socket.onclose   = function(msg) { 
		// 					   log("Connected - status "+this.readyState); 
		// 				   };
        socket.onclose   = function(msg) { 
							   log("<?php echo $_SESSION['usuario']['usu_nombre']?> joined the chat"); 
						   };
	}
	catch(ex){ 
		log(ex); 
	}
	$("msg").focus();
}

function send(){
	var txt,msg,usr;
	txt = $("msg");
	msg = txt.value;
	if(!msg) { 
		alert("Message can not be empty"); 
		return; 
	}
	txt.value="";
	txt.focus();
	try { 
		socket.send(msg); 
		log("<?php echo $_SESSION['usuario']['usu_nombre']?>: "+msg); 
	} catch(ex) { 
		log(ex); 
	}
}
function quit(){
	if (socket != null) {
		log("<?php echo $_SESSION['usuario']['usu_nombre']?> left the chat");
		socket.close();
		socket=null;
	}
}

function reconnect() {
	quit();
	init();
}

// Utilities
function $(id){ return document.getElementById(id); }
function log(msg){ $("log").innerHTML+="<br>"+msg; }
function onkey(event){ if(event.keyCode==13){ send(); } }
</script>

</head>
<body onload="init()">
<div id="log" style="word-wrap: break-word;"></div>
<textarea id="msg" type="textbox" onkeypress="onkey(event)" style="width: 50rem;"></textarea>
<button onclick="send()" style="width: 7rem;">Send</button>
<button onclick="quit()" style="width: 7rem;">Quit</button>
<button onclick="reconnect()" style="width: 7rem;">Reconnect</button>
</body>
</html>