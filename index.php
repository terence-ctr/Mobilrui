<!DOCTYPE html>
<html>
<head>
    <title>Téléphone</title>
    <style>
        .phone {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .keypad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
            margin-bottom: 10px;
        }

        .keypad button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            
            
        }

        .response {
            font-size: 15px;
            font-weight: 300;
            margin-top: 10px;
            padding: 12px;
            background-color: #e0e0e0;
            border-radius: 5px;
        }
      
    
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-400 ">
       
    <div class="phone mt-8">
 



     <div class="block max-w-sm p-6 mb-4 bg-white border border-gray-200 rounded-lg ">
            
            <p class="font-normal text-gray-700 dark:text-gray-400" id="messageCard" > </p>
        </div>
 
       
        <div class="keypad">
            <button onclick="addToScreen('0')" class="hover:bg-green-800 focus:ring-2 focus:ring-green-300 rounded-lg">0</button>
            <button onclick="addToScreen('1')" class="hover:bg-green-800  focus:ring-2 focus:ring-blue-300 rounded-lg">1</button>
            <button onclick="addToScreen('2')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">2</button>
            <button onclick="addToScreen('3')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">3</button>
            <button onclick="addToScreen('4')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">4</button>
            <button onclick="addToScreen('5')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">5</button>
            <button onclick="addToScreen('6')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">6</button>
            <button onclick="addToScreen('7')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">7</button>
            <button onclick="addToScreen('8')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">8</button>
            <button onclick="addToScreen('9')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">9</button>
            <button onclick="addToScreen('#')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">#</button>
            <button onclick="addToScreen('*')" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">*</button>
           
                        
                        <button type="submit" onclick="sendRequest()"   class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg ">Envoyer</button>
                        <button style="background-color: transparent;"></button>
                        <button type="button" onclick="resetForm()" class="hover:bg-green-800 focus:ring-2 focus:ring-blue-300 rounded-lg">Reset</button>
                    
        </div>
       
        <form method="post" action="index.php">
            <div class="mb-6">
                <input type="text" name="actions" id="actions" readonly class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </form>
      

      <script>
            function addToScreen(key) {
                var actionsInput = document.getElementById('actions');
                actionsInput.value += key;
            }

            function resetForm() {
                var actionsInput = document.getElementById('actions');
                actionsInput.value = '';
            }

            function displayMessage(message) {
                var messageCard = document.getElementById('messageCard');
                messageCard.innerHTML = '<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Affichage de Message</h5><p class="font-normal text-gray-700 dark:text-gray-400">' + message + '</p>';
            }

            function sendRequest() {
                var actionsInput = document.getElementById('actions');
                var actions = actionsInput.value;

                fetch('http://localhost/Exercice/api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ actions: actions })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        displayMessage(data.message);
                    } else {
                        displayMessage('Réponse invalide de l\'API');
                    }
                })
                .catch(error => {
                    displayMessage('Erreur lors de l\'appel à l\'API');
                });
            }
        </script>
    </div>
    </div>
</body>
</html>