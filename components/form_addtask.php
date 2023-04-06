<form action = "addtask.php" method = "post">
	<div class = "input_box">
		<h2 class = "page_title_style">Список дел</h2>
		<form action = "" method = "post">
			<input type = "text" name = "task">
			<input type = "submit" value = "Добавить">
		</form>
		<script>
			async function deletetask()
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