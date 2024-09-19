//ensuring navigation to all items page
describe('All Items Page', () => {
    beforeEach(() => {
        cy.visit('/all-items');
    });

    it('should navigate to All Items page', () => {
        cy.url().should('include', '/all-items');
        cy.contains('Search items...').should('be.visible');
    });
});


//test checks for search functionality
describe('Search Functionality', () => {
    beforeEach(() => {
        cy.visit('/all-items');
    });

    it('should display relevant food items based on search query', () => {
        cy.get('input[name="search"]').type('Pizza');
        cy.get('button[type="submit"]').click();

        // Ensure the results are displayed and relevant
        cy.get('.container').should('contain', 'Pizza');
        cy.get('.container').should('not.contain', 'No items found matching your search criteria.');
    });

    it('should display no items if search yields no results', () => {
        cy.get('input[name="search"]').type('NonExistentItem');
        cy.get('button[type="submit"]').click();

        // Ensure no results message is displayed
        cy.get('.container').should('contain', 'No items found matching your search criteria.');
    });
});


//test checks for cart items
describe('Cart Functionality', () => {
    beforeEach(() => {
        cy.login(); // Custom command to login the user
        cy.visit('/all-items');
    });

    it('should display the correct number of items in the cart', () => {
        cy.get('.fas.fa-shopping-cart').should('be.visible');
        cy.get('.fas.fa-shopping-cart').contains('(0)');

        // Assuming a user with items in the cart
        cy.addToCart(1); // Custom command to add an item to the cart
        cy.reload();
        cy.get('.fas.fa-shopping-cart').contains('(1)');
    });
});


//test case to ensure visibility of categories section
describe('Categories Section', () => {
    beforeEach(() => {
        cy.visit('/all-items');
    });

    it('should display all categories', () => {
        cy.contains('Search by Category').should('be.visible');
        cy.get('.flex.justify-center.space-x-6.overflow-x-auto.pb-4').children().should('have.length', 6); // Assuming 6 categories
    });
});


//checking for flash message functionality
describe('Flash Banner', () => {
    it('should display and hide flash banner after 5 seconds', () => {
        cy.visit('/all-items'); // Simulate a session with a success flash message
        cy.get('#flash-banner').should('be.visible');

        // Check if the banner disappears after 5 seconds
        cy.wait(5000);
        cy.get('#flash-banner').should('not.exist');
    });
});


//test cases to ensure visibility of supplier
describe('Suppliers Section', () => {
    beforeEach(() => {
        cy.visit('/all-items');
    });

    it('should display suppliers section with correct details', () => {
        cy.contains('Suppliers').should('be.visible');
        cy.get('.grid.grid-cols-1.sm\\:grid-cols-2.lg\\:grid-cols-3.gap-8').children().should('have.length', 3); // Assuming 3 suppliers


    });
});
