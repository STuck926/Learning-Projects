const input = document.getElementById('input');

function isPalindrome() {
    const value = input.value;
    const reversedValue = value.split('').reverse().join('');
    if (value === reversedValue) {
        alert(`${value} is a palindrome.`);
    } else {
        alert(`${value} is not a palindrome.`);
    }

    input.value = '';
}