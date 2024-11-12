// Sample data for animals (You can replace this with actual data from the database)
const animals = [
    { name: 'Bella', species: 'Dog', breed: 'Labrador', age: '2 years', img: 'https://placekitten.com/300/200' },
    { name: 'Milo', species: 'Cat', breed: 'Siamese', age: '1 year', img: 'https://placekitten.com/301/200' },
    { name: 'Luna', species: 'Rabbit', breed: 'Angora', age: '6 months', img: 'https://placekitten.com/302/200' },
];

// Function to display animal cards dynamically
function displayAnimals() {
    const animalList = document.getElementById('animal-list');
    animalList.innerHTML = animals.map(animal => `
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="${animal.img}" class="card-img-top" alt="${animal.name}">
                <div class="card-body">
                    <h5 class="card-title">${animal.name}</h5>
                    <p class="card-text">${animal.species} - ${animal.breed}</p>
                    <p class="card-text"><small>Age: ${animal.age}</small></p>
                    <a href="#" class="btn btn-primary">Adopt Me</a>
                </div>
            </div>
        </div>
    `).join('');
}

// Contact alert function
function showAlert() {
    alert("Thank you for your interest! You can contact us at (123) 456-7890 or email us at shelter@example.com.");
}

// Form validation for login
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if(email && password) {
        alert('Logged in successfully!');
        document.getElementById('loginModal').click();
    } else {
        alert('Please enter both email and password.');
    }
});

// Run display function on load
document.addEventListener('DOMContentLoaded', displayAnimals);
