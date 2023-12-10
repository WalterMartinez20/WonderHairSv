<?php
session_start();

include "../loginUsuario/clases/Auth.php";

$Auth = new Auth();

$salones = $Auth->conseguirSalonesChat($_SESSION['id']);

if (!isset($_SESSION['email'])) {
    // Redireccionar a Index (◕‿-)
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>chat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>
</head>

<body>
    <div>
        <div>
            <div class="relative min-h-screen flex flex-col bg-gray-50">
                <nav class="flex-shrink-0 bg-blue-600">
                    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">

                        <div class="relative flex items-center justify-between h-16">
                            <div>
                                <button class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-black-500 hover:bg-blue-300 focus:outline-none">
                                    <a href="../index.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                                        </svg>
                                    </a>
                                </button>

                            </div>
                            <div></div>
                            <div class="flex lg:hidden">
                                <button class="bg-blue-600 inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-skyblue-600 focus:outline-none focus:ring-2 focus:ring-offser-2 focus:ring-offset-red-600 focus:ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                                    </svg>
                                </button>

                            </div>

                            <div class="hidden lg:block lg:w-80">
                                <div class="flex items-center justify-end">
                                    <div class="flex">
                                        <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:text-white">
                                            Chat
                                        </a>
                                        <div class="ml-4 relative flex-shrink-0">
                                            <div>
                                                <button class="bg-red-700 flex text-sm rounded-full text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-700 focus:ring-white">
                                                    <img alt="logo" src="../img/logos/<?php echo $_SESSION['logo'] ?>" class="h-8 w-8 rounded-full">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </nav>
                <!--NAV SECTION-->
                <div class="flex-grow w-full max-w-7xl mx-auto lg:flex">
                    <div class="flex-1 min-w-0 bg-white xl:flex">
                        <div class="border-b border-gray-200 xl:border-b-0 xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200 bg-gray-50">
                            <div class="h-full pl-4 pr-2 py-6 sm:pl-6 lg:pl-8 xl:pl-0">
                                <div class="h-full relative">
                                    <div class="relative rounded-lg px-2 py-2 flex items-center space-x-3 hover:border-gray-400 focus-whitin:ring-2 focus-whitin:ring-offset-2 focus-whitin:ring-red-500 mb-4">
                                        <div class="flex-shrink-0">
                                            <img alt="logo" src="../img/logos/<?php echo $_SESSION['logo'] ?>" class="h-12 w-12 rounded-full">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="#" class="focus:outline-none">
                                                <span class="absolute inset-0"></span>
                                                <p class="text-sm font-bold text-black-600"><?php echo $_SESSION['nombre'] ?></p>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                </svg>

                                            </div>
                                            <input oninput="filterRooms()" type="text" name="buscar" id="buscar" class="focus:ring-red-500 focus:border-red-500 block w-full pl-10 sm:text-sm border-gray-100 rounded-full p-2 border">
                                        </div>
                                    </div>
                                    <!--BUSCADOR BOX END USUARIO 1------------------------------------------>
                                    <?php if (!count($salones) == 0) {
                                        foreach ($salones as $salon) : ?>
                                            <div class="relative rounded-lg px-2 py-2 flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 mb-3 hover:bg-gray-200 chat-perfiles" onclick="openChat(<?php echo $salon['id'] ?>, '<?php echo $salon['nombre'] ?>', '<?php echo $salon['logos'] ?>')" id="<?php echo $salon['id'] ?>">
                                                <div class="flex-shrink-0">
                                                    <img alt="logo" src="../img/logos/<?php echo $salon['logos'] ?>" class="h-10 w-10 rounded-full">
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <a href="#" class="focus:outline-none">
                                                        <div class="flex items-center justify-between">
                                                            <p class="text-sm font-bold text-black-600">
                                                                <?php echo $salon['nombre'] ?>
                                                            </p>
                                                            <!-- <div class="text-gray-400 text-xs" id="lastcon-<?php echo $salon['id'] ?>">
                                                        --:-- --
                                                        </div> -->
                                                        </div>
                                                        <div class="flex items-center justify-between">
                                                            <!-- <p class="text-sm text-gray-500 truncate" id="lastmsg-<?php # echo $salon['id'] 
                                                                                                                        ?>">...</p> -->
                                                            <!-- <div class="text-white text-xs bg-blue-400 rounded-full px-1 py-0" id="countmsg-<?php # echo $salon['id'] 
                                                                                                                                                    ?>">
                                                        2
                                                        </div> -->
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php endforeach;
                                    } ?>'
                                </div>
                            </div>
                        </div>

                        <!--MIDOLE CONTENT----------------------------------------->
                        <div class="flex-1 p:2 sm:pb-6 justify-between flex flex-col h-screen hidden xl:flex">
                            <div class="flex sm:items-center justify-between py-3 border-b border-gray-200 p-3">
                                <div class="flex items-center space-x-4" style="height: 0; overflow: hidden; transition: all .5s;" id="chatheader">
                                    <img alt="chat" src="" class="w-10 sm:h-12 rounded-full cursor pointer" id="chatimg">

                                    <div class="flex flex-col leading-tight">
                                        <div class="text-1xl mt-1 flex items-center">
                                            <p class="text-gray-700 mr-3" id="chatname"></p>
                                        </div>
                                        <div class="flex">
                                            <small class="text-gray-500" id="chatstate"></small>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="flex items-center space-x-2 ">
                                    <button class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                        
                                    </button>
                                    <button class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                </div> -->

                            </div>
                            <!---MENSAJES-------------------------------------------------------------------->
                            <div id="mensajes" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                                <div style="margin: auto; width: 100%; text-align: center;" id="nochat">
                                    Seleccione un chat
                                </div>

                                <!-- <div class="chat-message">
                                    <div class="flex items-end">
                                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                            <div>
                                                <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-200 text-gray-600">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam dignissimos
                                                </span>
                                            </div>
                                            <small class="text-gray-500">1:00 pm</small>
                                        </div>
                                        <img src="../images/foto1.jpg" class="w-6 h-6 rounded-full order-1">
                                    </div>
                                </div>
                                <div class="chat-message ">
                                    <div class="flex items-end  flex-row-reverse">
                                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-end">
                                            <div>
                                                <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-500 text-black">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam dignissimos
                                                </span>
                                            </div>
                                            <small class="text-gray-500">1:10 pm</small>
                                        </div>
                                        <img src="../images/salon.jpg" class="w-6 h-6 rounded-full order-1">
                                    </div>
                                </div> -->
                            </div>
                            <!-------Caja de texto de los mensajes------------------------------>
                            <!-- <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 mb-16" id="textbox" style="height: 0; overflow: hidden;"> -->
                            <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 mb-16" id="textbox">
                                <div class="flex items-center justify-between px-14 w-full my-2">
                                    <p id="result"></p>
                                    <button id="clearFileButton" style="display: none;">✖</button>
                                </div>
                                <div class="relative flex">
                                    <input placeholder="Escriba su mensaje" type="text" id="messageInput" class="focus:ring-blue-500 focus:border-blue-500 w-full focus:placeholder-gray-400 text-gray-600 placeholder-gray-300 pl-12 bg-gray-100 rounded-full py-3 border-gray-200 mr-3">
                                    <!--boton de agregar imagenes archivos,etc---------------------->
                                    <input type="file" class="hidden" id="fileInput" enabled>
                                    <label for="fileInput" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 mr-4 cursor-pointer">
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                                        </svg>
                                    </label>

                                    <button id="sendButton" class="bg-blue-500 text-white rounded px-3 py-3 transition duration-500 ease-in-out text-blue-500 hover:bg-blue-300 mr-4">Enviar</button>

                                </div>

                            </div>
                        </div>
                        <div class="bg-gray-50 pr-4 sm:pr-6 lg:pr-8 lg:flex-shrink-0 lg:border-l lg:border-gray-200 xl:pr-0 hidden xl:block">
                            <div class=""></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        const socket = io('http://127.0.0.1:3000');
        const chatHeader = document.getElementById('chatheader');
        const chatImg = document.getElementById('chatimg');
        const chatName = document.getElementById('chatname');
        const chatState = document.getElementById('chatstate');
        const messageInput = document.getElementById('messageInput');
        const textBox = document.getElementById('textbox');
        const msgArea = document.getElementById('mensajes');
        let idChat;
        let mensajes = [];
        let chatLogo;
        let messageQueue = [];
        let isfile = false;
        let openchatstate = false;

        document.getElementById('fileInput').addEventListener('change', () => {
            const fileInput = document.getElementById('fileInput');
            const clearFileButton = document.getElementById('clearFileButton');

            if (fileInput.files.length > 0) {
                fileInput.disabled = true;
                clearFileButton.style.display = 'inline-block'; // Mostrar el botón "Eliminar archivo"

                const selectedFileName = fileInput.files[0].name;
                isFile = true;

                document.getElementById('result').textContent = selectedFileName;
            } else {
                clearFileButton.style.display = 'none'; // Ocultar el botón "Eliminar archivo"
                document.getElementById('result').textContent = ''; // Borrar el texto de resultado
                isFile = false;
                fileInput.disabled = false;
            }
        });

        document.getElementById('clearFileButton').addEventListener('click', () => {
            const fileInput = document.getElementById('fileInput');

            fileInput.value = ''; // Borrar la selección de archivo
            document.getElementById('result').textContent = ''; // Borrar el texto de resultado
            isFile = false;
            fileInput.disabled = false;
            clearFileButton.style.display = 'none'; // Ocultar el botón "Eliminar archivo"
        });


        function filterRooms() {
            const searchInput = document.getElementById("buscar").value.toLowerCase();
            const rooms = document.querySelectorAll(".chat-perfiles");

            rooms.forEach(room => {
                const roomName = room.querySelector(".text-black-600").textContent.toLowerCase();

                if (roomName.includes(searchInput)) {
                    room.style.display = "block";
                } else {
                    room.style.display = "none";
                }
            });
        }


        function saveMessageQueueToLocalStorage() {
            localStorage.setItem('messageQueue', JSON.stringify(messageQueue));
        }

        function loadMessageQueueFromLocalStorage() {
            const storedMessageQueue = localStorage.getItem('messageQueue');
            if (storedMessageQueue) {
                messageQueue = JSON.parse(storedMessageQueue);
            }
        }


        if (Notification.permission !== 'granted') {
            Notification.requestPermission().then((permission) => {
                if (permission === 'granted') {
                    console.log('Permiso de notificación otorgado');
                } else {
                    console.log('Permiso de notificación denegado');
                }
            });
        }

        function mostrarNotificacion(titulo, cuerpo) {
            if (Notification.permission === 'granted') {
                const options = {
                    body: cuerpo,
                };

                const notification = new Notification(titulo, options);
            }
        }

        function openChat(id, name, logo) {
            chatHeader.style.height = 'auto';
            // textBox.style.height = 'fir-content';
            chatImg.src = `../img/logos/${logo}`;
            chatName.innerText = name;
            // chatState.innerText = '...';
            idChat = id;
            chatLogo = logo;
            if (!openchatstate) {
                document.getElementById('nochat').style.display = 'none';
                openchatstate = true;
            }
            console.log('done');
            if (socket.connected) {
                socket.emit('getMessages');
            } else {
                if (localStorage.messages) {
                    messages = JSON.parse(localStorage.getItem('messages'));

                    msgArea.innerHTML = '';
                    renderMessages(messages);
                }
            }

            console.log(typeof id, 'reciviendo como ', id);
        }

        function getFormattedTime() {
            const date = new Date();
            const hours = date.getHours();
            const minutes = date.getMinutes();
            const period = hours >= 12 ? 'PM' : 'AM';
            const formattedHours = hours % 12 === 0 ? 12 : hours % 12;
            const formattedMinutes = minutes.toString().padStart(2, '0');

            return `${formattedHours}:${formattedMinutes} ${period}`;
        }

        socket.on('connect', () => {
            console.log('Conectado al servidor de Node.js');

            loadMessageQueueFromLocalStorage();

            while (messageQueue.length > 0) {
                const message = messageQueue.shift();
                socket.emit('message', message);
            }
        });

        socket.on('messageToClient', (data) => {
            if (
                (data.from === <?php echo $_SESSION['id']; ?> && data.to === idChat) ||
                (data.from === idChat && data.to === <?php echo $_SESSION['id']; ?>)
            ) {
                const isCurrentUser = data.from === <?php echo $_SESSION['id']; ?>;
                const messageElement = createMessageElement(data.msg, data.date, isCurrentUser, data.type, [data.name, data.format, data.link]);
                msgArea.appendChild(messageElement);
            }

            if (data.to === <?php echo $_SESSION['id']; ?>) {
                mostrarNotificacion(`Nuevo mensaje de ${data.nombre}`, data.msg);
            }
        });

        socket.on('allMessages', (messages) => {
            localStorage.setItem('messages', JSON.stringify(messages));

            msgArea.innerHTML = '';
            renderMessages(messages);
        });

        function renderMessages(messages) {
            messages.forEach((data) => {
                if (
                    (data.from === <?php echo $_SESSION['id']; ?> && data.to === idChat) ||
                    (data.from === idChat && data.to === <?php echo $_SESSION['id']; ?>)
                ) {
                    const isCurrentUser = data.from === <?php echo $_SESSION['id']; ?>;
                    const messageElement = createMessageElement(data.msg, data.date, isCurrentUser, data.type, [data.name, data.format, data.link]);
                    msgArea.appendChild(messageElement);
                }
            });
        }

        function createMessageElement(message, date, isCurrentUser, type, dataType = null) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('chat-message');

            const flexClass = isCurrentUser ? 'flex-row-reverse' : '';

            if (type === 'text') {
                messageDiv.innerHTML = `
                    <div class="flex items-end ${flexClass}">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 ${isCurrentUser ? 'items-end' : 'items-start'}">
                            <div>
                                <span class="px-4 py-2 rounded-lg inline-block rounded-${isCurrentUser ? 'br' : 'bl'}-none bg-${isCurrentUser ? 'blue' : 'gray'}-500 text-${isCurrentUser ? 'black' : 'gray'}">
                                    ${message}
                                </span>
                            </div>
                            <small class="text-gray-500">
                                ${date}
                            </small>
                        </div>
                        <img src="../img/logos/${isCurrentUser ? '<?php echo $_SESSION['logo'] ?>' : chatLogo}" class="w-6 h-6 rounded-full order-1">
                    </div>
                `;
            } else if (type === 'file') {
                let contentHtml = '';

                if (dataType[1] === 'png' || dataType[1] === 'jpg' || dataType[1] === 'jpeg' || dataType[1] === 'gif' || dataType[1] === 'jfif') {
                    contentHtml = `<div class="px-4 py-2 rounded-lg inline-block rounded-${isCurrentUser ? 'br' : 'bl'}-none bg-${isCurrentUser ? 'blue' : 'gray'}-500 text-${isCurrentUser ? 'black' : 'gray'}">
                                        <img src="../files/${dataType[2]}" class="max-w-sm mx-auto">
                                        <br>
                                        ${message}
                                    </div>`;
                } else {
                    contentHtml = `<div class="px-4 py-2 rounded-lg inline-block rounded-${isCurrentUser ? 'br' : 'bl'}-none bg-${isCurrentUser ? 'blue' : 'gray'}-500 text-${isCurrentUser ? 'black' : 'gray'}">
                                    <a href="../files/${dataType[2]}" download="${dataType[0]}" style="margin-bottom: 5px; box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); padding: 10px; width: 100%; border-radius: 10px; float: left;">${dataType[0]}</a>
                                    <br>
                                    <p style="margin-top: 5px">${message}</p>
                                </div>`;
                }

                messageDiv.innerHTML = `
                    <div class="flex items-end ${flexClass}">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 ${isCurrentUser ? 'items-end' : 'items-start'}" style="padding: 0px;">
                            ${contentHtml}
                            <small class="text-gray-500">
                                ${date}
                            </small>
                        </div>
                        <img src="../img/logos/${isCurrentUser ? '<?php echo $_SESSION['logo'] ?>' : chatLogo}" class="w-6 h-6 rounded-full order-1">
                    </div>
                `;
            }

            return messageDiv;
        }


        document.getElementById('sendButton').addEventListener('click', async () => {
            const date = getFormattedTime();

            const fileInput = document.getElementById('fileInput');
            const clearFileButton = document.getElementById('clearFileButton');
            const selectedFile = fileInput.files[0];

            let message = {
                msg: messageInput.value,
                from: <?php echo $_SESSION['id'] ?>,
                to: idChat,
                date: date,
                nombre: '<?php echo $_SESSION['nombre'] ?>',
                type: 'text',
                name: '',
                format: '',
                link: '',
            }

            if (message.msg.trim() !== '') {
                if (selectedFile) {
                    const formData = new FormData();
                    formData.append('file', selectedFile);

                    try {
                        const response = await fetch('files.php', {
                            method: 'POST',
                            body: formData,
                        });

                        const result = await response.json();
                        console.log(result);
                        document.getElementById('result').textContent = '';
                        message.type = "file";
                        message.name = result.name;
                        message.format = result.extension;
                        message.link = result.file;
                    } catch (error) {
                        console.error('Error al subir el archivo:', error);
                    }
                }

                if (socket.connected) {
                    socket.emit('message', message);
                } else {
                    messageQueue.push(message);
                    saveMessageQueueToLocalStorage();
                    const messageElement = createMessageElement(message.msg, message.date, true, message.type, [message.name, message.format, message.link]);
                    msgArea.appendChild(messageElement);
                }
                messageInput.value = '';
                fileInput.value = '';
                clearFileButton.style.display = 'none';
                fileInput.disabled = false;
            }
        });

        socket.on('disconnect', () => {
            console.log('Desconectado del servidor de Node.js');

            saveMessageQueueToLocalStorage();
        });
    </script>
</body>

</html>