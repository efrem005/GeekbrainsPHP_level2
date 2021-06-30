let btn = document.querySelectorAll('.buy')

btn.forEach((elem) => {
    let id = elem.getAttribute('data-id');
    elem.addEventListener('click', () => {
        (
            async () => {
                const response = await fetch('/basket/buy', {
                    method: 'POST',
                    headers: {
                        'Content-Type' : 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({
                        id: id
                    })
                });
                let answer = await response.json()
                document.getElementById('countBasket').innerText = answer.count
            }
        )()
    })
})