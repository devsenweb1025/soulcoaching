# Soul Coaching E-Commerce Platform

A modern e-commerce platform built with Laravel and Metronic theme, featuring online courses, product sales, and booking management.

## About Metronic Theme

This project uses the Metronic theme for its admin dashboard and frontend design.

- For a quick start please check [Online documentation page](//preview.keenthemes.com/metronic8/laravel/documentation/getting-started/build)
- All demos assets are included in the package. To switch the demo please check [Switch demo documentation](//https://preview.keenthemes.com/metronic8/laravel/documentation/getting-started/multi-demo/build)
- For any theme related questions please contact our [Theme Support](//keenthemes.com/support/)
- Using Metronic in a new project or for a new client? Purchase a new license https://1.envato.market/EA4JP
- Stay tuned for updates via [Twitter](//www.twitter.com/keenthemes) and [Instagram](//www.instagram.com/keenthemes)

## Project Features

### User Features
- User authentication and profile management
- Product browsing and search
- Shopping cart functionality
- Order management and tracking
- Course booking and management
- Real-time chat support

### Admin Features
- Dashboard with sales analytics
- Product management (CRUD operations)
- Order management
- Course management
- User management
- Chat message management

### Technical Features
- Responsive design using Metronic theme
- Real-time cart updates
- Secure payment processing
- Image upload and management
- Multi-language support
- SEO optimization

## Requirements

- PHP >= 8.1
- MySQL >= 5.7
- Composer
- Node.js & NPM
- Git

## Installation

1. Clone the repository:
```bash
git clone [repository-url]
cd [project-directory]
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install NPM dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run migrations and seeders:
```bash
php artisan migrate
php artisan db:seed
```

8. Start the development server:
```bash
php artisan serve
```

9. Compile assets:
```bash
npm run dev
```

## Database Structure

### Main Tables
- `users` - User accounts and profiles
- `products` - Product catalog
- `orders` - Customer orders
- `order_items` - Order line items
- `courses` - Online courses
- `bookings` - Course bookings
- `chat_messages` - Support chat messages
- `categories` - Product categories
- `product_images` - Product images

### Relationships
- Products belong to categories
- Orders belong to users
- Order items belong to orders and products
- Bookings belong to users and courses
- Chat messages belong to users

## API Endpoints

### Authentication
- POST `/api/auth/login` - User login
- POST `/api/auth/register` - User registration
- POST `/api/auth/logout` - User logout

### Products
- GET `/api/shop` - List all products
- GET `/api/shop/{slug}` - Show product details
- GET `/api/shop/search` - Search products
- GET `/api/shop/category/{category}` - Filter by category

### Cart
- GET `/api/cart` - View cart
- POST `/api/cart/add` - Add to cart
- POST `/api/cart/update` - Update cart item
- POST `/api/cart/remove` - Remove from cart
- GET `/api/cart/count` - Get cart count

### Orders
- GET `/api/account/orders` - List user orders
- GET `/api/account/orders/{order}` - Show order details
- POST `/api/account/orders/track` - Track order

### Admin
- GET `/api/admin` - Admin dashboard
- Resource routes for products, orders, users, etc.

## Frontend Features

### Shopping Cart
- Real-time quantity updates
- Dynamic price calculation
- Persistent cart storage
- Checkout process

### Product Display
- Responsive grid layout
- Image gallery
- Product filtering
- Search functionality

### User Dashboard
- Order history
- Profile management
- Course bookings
- Chat support

## Admin Panel

### Dashboard
- Sales analytics
- Recent orders
- Recent chat messages
- Recent bookings

### Product Management
- Create/Edit products
- Image upload
- Category assignment
- Inventory management

### Order Management
- View all orders
- Update order status
- Process refunds
- Generate reports

## Security Features

- CSRF protection
- XSS prevention
- SQL injection prevention
- Secure password hashing
- Role-based access control
- API authentication using Laravel Sanctum

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support, email [support@example.com] or open an issue in the repository.
