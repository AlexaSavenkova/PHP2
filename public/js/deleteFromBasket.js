const buttonsDel = document.querySelectorAll('.delete');
buttonsDel.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        (
            async () => {
                const response = await fetch('/basket/delete/?id=' + id);
                const answer = await response.json();
                if (answer.quantity == '0') {
                    document.getElementById('div'+id).remove();
                } else {
                    document.getElementById(id).innerText = answer.quantity;
                }
                
                document.getElementById('count').innerText = answer.count;
                if (answer.count == '0') {
                    document.getElementById('empty').innerText = 'Корзина пуста';
                    document.getElementById('order').innerText = '';
                } else {
                    document.getElementById('sum').innerText = answer.sum;
                }
            }
        )();
    })
});