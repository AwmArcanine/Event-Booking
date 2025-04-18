const selections = { event: '', theme: '', cuisine: '' };

document.querySelectorAll('.event').forEach(el => {
    el.addEventListener('click', () => {
        let category = '';

        if (el.classList.contains('event1') || el.classList.contains('event2') || el.classList.contains('event3')) {
            category = 'event';
        } else if (el.classList.contains('decor1') || el.classList.contains('decor2') || el.classList.contains('decor3')) {
            category = 'theme';
        } else if (el.classList.contains('food1') || el.classList.contains('food2') || el.classList.contains('food3')) {
            category = 'cuisine';
        }

        document.querySelectorAll(`.${category}1, .${category}2, .${category}3, .${category}4, .${category}5, .${category}6`).forEach(e => {
            e.style.border = 'none';
            e.style.filter = 'grayscale(100%)';
            e.style.transform = 'scale(1)';
        });

        el.style.border = '4px solid #1d3556';
        el.style.filter = 'grayscale(0%)';
        el.style.transform = 'scale(1.05)';
        selections[category] = el.textContent;
        document.getElementById(`selected_${category}`).value = el.textContent;
    });
});

window.onload = function () {
    const params = new URLSearchParams(window.location.search);
    if (params.get('status') === 'success') {
        document.getElementById('confirmationModal').style.display = 'flex';
        const url = new URL(window.location);
        url.searchParams.delete('status');
        window.history.replaceState({}, document.title, url.toString());
    }
};


