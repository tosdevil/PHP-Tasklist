<form action = "" method = "post">
	<div class = "input_box">
		<h2 class = "page_title_style">Список дел</h2>
		<form action = "addtask.php" method = "post">
			<input type = "text" name = "task">
			<input type = "submit" value = "Добавить">
		</form>
		<div class="edit_task_block hidden" style = "display: flex; position: absolute; align-items: center; justify-content: center; margin-left: 40vw; border: 10px solid black; padding: 10px; background: white;">
			<form action = "" method = "post" class = "hidden">
				<!-- <input type = "text" name = "editedtask" class = "hidden">
				<input type = "submit" value = "Отредактировать" class = "hidden" onclick = 'closeeditblock()'> -->
			</form>
		</div>
		<div class="ddd"></div>
		<!-- <div class="singletask_block" style = "width: 500px;display:flex;flex-direction:row; margin-left:20px;margin-right:20px; justify-content: space-between; border: 5px solid black; padding: 10px;">
			<p class="singletask_author">Автор</p>
			<p class="singletask_label">Задача</p>
			<button class="singletask_edit" onclick = "edittask()"><img src = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Black_pencil.svg/600px-Black_pencil.svg.png" style = "width:20px;height:20px;"/></button>
			<button class="singletask_delete" onclick = "deletetask()"><img src = "https://cdn-icons-png.flaticon.com/512/542/542724.png" style = "width:20px;height:20px;"/></button>
		</div> -->
		<script>
			let editblock = document.querySelector('.edit_task_block');
			function edittask(taskid)
			{
				// editblock.innerHTML =
				editblock.innerHTML += `
				<form action = "update.php?id=${taskid}" method = "post">
					<input type = "text" name = "editedtask">
					<input type = "submit" value = "Отредактировать" onclick = 'closeeditblock()'>
				</form>
				`;
				editblock.classList.remove('hidden');
			}

			function closeeditblock()
			{
				editblock.classList.add('hidden');
			}
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