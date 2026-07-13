# 🚌 Bus Ticket Reservation System (BTRS)

A simple web-based **Bus Ticket Reservation System** built with PHP and MySQL. This project allows passengers to register, log in, view available trips, book seats, cancel bookings, and view their booking history. It also includes an admin panel for managing buses, routes, and schedules.

---

## ✨ Features

### 👤 For Passengers
- **User Registration & Login** (with phone number and password)
- **View Available Trips** – see all bus schedules with source, destination, date, and time
- **Interactive Seat Selection** – choose from a visual seat layout; booked seats are disabled
- **Book a Ticket** – instantly reserve a seat
- **My Bookings** – view all your tickets with booking date and status
- **Cancel Booking** – cancel tickets (status updates to `cancel`)
- **Logout** – end your session securely

### 👨‍💼 For Administrators
- Dedicated admin login (default credentials: `admin` / `1234`)
- **Add New Bus** – specify bus number and total seats
- **Add New Route** – define source, destination, and distance
- **Add New Schedule** – assign a bus and route with departure time and date
- **View All User Bookings** – see every passenger's ticket details (admin-only page)

---

## 🛠️ Technologies Used

- **Frontend:** HTML5, CSS3 (basic styling)
- **Backend:** PHP 7.4+ (procedural style)
- **Database:** MySQL (via `mysqli` extension)
- **Server:** Apache (local) / InfinityFree (online)

---

## 📂 Project Structure

```
/
├── index.php               # Redirects to login.html
├── login.html              # Passenger login form
├── login.php               # Passenger login handler
├── signup.html             # Passenger signup form
├── signup.php              # Passenger registration handler
├── booking.php             # Passenger dashboard (welcome page)
├── schedule_list.php       # Shows all available trips
├── seat_layout.php         # Displays seat layout for a chosen trip
├── book.php                # Processes seat booking
├── my_booking.php          # Shows logged-in user's bookings
├── cancel.php              # Cancels a booking
├── logout.php              # Destroys session and logs out
│
├── admin_login.html        # Admin login form
├── admin_login.php         # Admin login handler
├── admin_dashboard.php     # Admin main panel
├── add_bus.php             # Add new bus
├── add_route.php           # Add new route
├── add_schedule.php        # Add new schedule
├── alluser_view_booking.php # Admin view of all bookings
│
├── btrs.sql                # Database dump (tables + sample data)
└── README.md               # This file
```

---

## 🗄️ Database Schema

The database is named `btrs` and contains the following tables:

- **admin** – `admin_id`, `username`, `password`
- **passenger** – `passenger_id`, `name`, `phone`, `password`
- **bus** – `bus_id`, `bus_number`, `total_seats`, `bus_type`
- **route** – `route_id`, `source`, `destination`, `distance`
- **schedule** – `schedule_id`, `bus_id`, `route_id`, `departure_time`, `travel_date`
- **ticket** – `ticket_id`, `passenger_id`, `schedule_id`, `seat_number`, `booking_date`, `status` (`book` or `cancel`)

Foreign keys link `schedule` to `bus` and `route`, and `ticket` to `passenger` and `schedule`.

---

## 🚀 Installation & Setup

### Option 1: Local Environment (XAMPP/WAMP)

1. **Clone or download** this repository to your `htdocs` (XAMPP) or `www` (WAMP) folder.
2. **Start Apache and MySQL** via your control panel.
3. **Create the database**:
   - Open phpMyAdmin (`http://localhost/phpmyadmin`)
   - Create a new database named `btrs`
   - Import the `btrs.sql` file (located in the project folder)
4. **Update database credentials** (if different from default):
   - In every `.php` file, find `mysqli_connect()` and adjust:
     ```php
     $conn = mysqli_connect("localhost", "root", "", "btrs");
     ```
5. **Access the application**:
   - Open your browser and go to `http://localhost/your-folder/`

---

### Option 2: Online Hosting (e.g., InfinityFree)

1. Upload all files to your website's root directory (e.g., via FTP or file manager).
2. Create a MySQL database and user via your hosting control panel.
3. Import `btrs.sql` into that database using phpMyAdmin.
4. **Update connection strings** in all `.php` files with your hosting credentials:
   ```php
   $conn = mysqli_connect("your_host", "your_user", "your_password", "your_database");
   ```
5. Set the MySQL password correctly in the hosting panel (if required).

---

## 🔐 Default Admin Credentials

| Username | Password |
|----------|----------|
| `admin`  | `1234`   |

You can change these directly in the `admin` table.

---

## 🧪 Testing the Connection

If you encounter connection issues, create a `test.php` file with the following content:

```php
<?php
$conn = mysqli_connect("your_host", "your_user", "your_password", "your_database");
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully!";
?>
```

Access it in your browser to verify your database setup.

---

## 📸 Screenshots (Optional)

Add screenshots of your application here. For example:

- Passenger login page
- Available trips list
- Seat layout
- Booking confirmation
- Admin dashboard

---

## 🤝 Contributing

This is a learning project, but contributions are welcome. Feel free to fork and submit pull requests for improvements (e.g., security enhancements, UI upgrade, or additional features like PDF tickets).

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 🙏 Acknowledgements

- Built as a college/school project to demonstrate basic PHP & MySQL skills.
- Deployed on [InfinityFree](https://www.infinityfree.com/) for free hosting.

---

## 📬 Contact

For any questions or suggestions, please feel free to open an issue or reach out.

---

**Happy Travels! 🎫**