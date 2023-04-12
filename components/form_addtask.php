<form action = "addtask.php" method = "post">
	<div class = "input_box">
		<h2 class = "page_title_style">Список дел</h2>
		<form action = "" method = "post">
			<input type = "text" name = "task">
			<input type = "submit" value = "Добавить">
		</form>
		<!-- <div class="singletask_block" style = "width: 500px;display:flex;flex-direction:row; margin-left:20px;margin-right:20px; justify-content: space-between; border: 5px solid black; padding: 10px;">
			<p class="singletask_author">Автор</p>
			<p class="singletask_label">Задача</p>
			<button class="singletask_edit" onclick = "edittask()"><img src = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Black_pencil.svg/600px-Black_pencil.svg.png" style = "width:20px;height:20px;"/></button>
			<button class="singletask_delete" onclick = "deletetask()"><img src = "https://cdn-icons-png.flaticon.com/512/542/542724.png" style = "width:20px;height:20px;"/></button>
		</div> -->
		<script>

			// setInterval(read(), 30);
			async function read()
		{
			console.log('hallo spaceboy!');
			let response = await fetch('addtask.php');
			if (response.ok) { // если HTTP-статус в диапазоне 200-299
    		// получить тело
   			 // получаем тело ответа (см. про этот метод ниже)
    	let answer = await response.text();
			console.log(answer);
			} else {
				alert("Ошибка HTTP: " + response.status);
			}
		}
			
			async function deletetask(taskid)
		{
			let response = await fetch('deletetask.php', {
				method: 'POST',
				body: new FormData(document.forms[0])
			});

			

			if (response.ok) { // если HTTP-статус в диапазоне 200-299
    		// получить тело
   			 // получаем тело ответа (см. про этот метод ниже)
    	let answer = await response.text();
			console.log(answer);
			textFromServer.innerHTML = answer;
			} else {
				alert("Ошибка HTTP: " + response.status);
			}
		}
		</script>
	</div>
</form>