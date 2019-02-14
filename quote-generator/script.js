const display = document.getElementById('display');
const twitterBtn = document.getElementById('twitter-share-button');
const newQuoteBtn = document.getElementById('new-quote');
const quoteText = document.getElementById('quote-text');
const quoteAuthor = document.getElementById('quote-author');
const body = document.getElementsByTagName('body');
let currentQuote = '';
let currentAuthor = '';

function getRandomColor() {
	const letters = '0123456789ABCDEF'.split('');
	let color = '#';

	for (var i = 0; i < 6; i++) {
		color += letters[Math.floor(Math.random() * 16)];
	}

	return color;
}

const getQuote = async () => {
	quoteText.innerText = `loading data...
        
        
        `;
	quoteAuthor.innerText = '';
	display.classList.add('new-text');
	let data = await fetch('https://andruxnet-random-famous-quotes.p.mashape.com/?cat=famous', {
		headers: {
			'X-Mashape-Key': 'VC4u68EmPnmshrbS7cVs5BZwQKiyp1zq2GAjsnAFFlbquG4ldT',
			Accept: 'application/json',
			'Content-Type': 'application/x-www-form-urlencoded'
		}
	})
		.then(response => {
			return response.json();
		})
		.then(json => {
			return json;
		})
		.catch(e => {
			return e;
		});

	currentQuote = data[0].quote;
	currentAuthor = data[0].author;
	display.classList.remove('new-text');
	twitterBtn.href = `https://twitter.com/intent/tweet?hashtags=quotes&text=${currentQuote} By ${currentAuthor}`;
	quoteText.innerText = currentQuote ? currentQuote : 'error loading data';
	quoteAuthor.innerText = currentAuthor ? currentAuthor : '';
	body[0].style.backgroundColor = getRandomColor();
};

getQuote();
newQuoteBtn.addEventListener('click', getQuote);
