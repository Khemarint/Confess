# Confess

Confess is a social media platform where users can connect, share their thoughts, and interact with each other. It's built using PHP Laravel and provides features like user registration, posting, commenting, liking, and profile management.

## Features

1. **User Registration and Login:**
   - Users can create an account by registering with their email and password.
   - Existing users can log in using their credentials.

2. **Confess Feelings:**
   - Users can express their feelings by creating posts (text-based).
   - Users: can edit update delete their posts.

3. **Interactions:**
   - **Likes:** Users can like posts created by others.
   - **Comments:** Users can leave comments on posts.
   - **Follow:** Users can follow other users to see their posts in their feed.

4. **Profile Management:**
   - **View Profile:**
     - Users can view their own profile, including their posts, followers, and likes.
     - Users can also view other users' profiles.
   - **Edit Profile:**
     - Users can update their profile information, such as name, profile picture, and bio.

## Installation

1. **Clone the Repository:**
git clone https://github.com/Khemarint/Confess.git cd Confess

2. **Install Dependencies:**
composer install


3. **Database Setup:**
- Create a MySQL database for your application.
- Update the `.env` file with your database credentials:
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database_name
  DB_USERNAME=your_database_user
  DB_PASSWORD=your_database_password
  ```

4. **Generate Application Key:**
php artisan key:generate


5. **Run Migrations:**
php artisan migrate

6. **Start the Development Server:**
php artisan serve


7. **Access the Application:**
Open your browser and visit `http://localhost:8000`.

## Contributing

Contributions are welcome! If you find any issues or want to add new features, feel free to submit a pull request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

