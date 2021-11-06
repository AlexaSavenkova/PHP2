const buttonsAdd = document.querySelectorAll('.buy');
buttonsAdd.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        (
            async () => {
                const response = await fetch('/basket/add/?id=' + id);
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
            }
        )();
    })
});