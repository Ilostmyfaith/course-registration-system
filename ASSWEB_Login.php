<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flip Card Login/Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(138, 43, 226, 0.8), rgba(255, 20, 147, 0.8)), 
                        url('https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b?w=1200') center/cover;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .flip-card-container {
            perspective: 1000px;
            width: 100%;
            max-width: 500px;
            height: 600px;
        }

        .flip-card {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .flip-card.flipped {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            border-radius: 15px;
            background: rgba(45, 30, 80, 0.85);
            backdrop-filter: blur(10px);
        }

        .flip-card-back {
            transform: rotateY(180deg);
            overflow-y: auto;
        }

        .form-title {
            font-size: 2.5em;
            color: white;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: white;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 0.95em;
        }

        input,
        select {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            background-color: rgba(255, 255, 255, 0.95);
            color: #333;
            transition: all 0.3s;
        }

        input::placeholder,
        select {
            color: #999;
        }

        input:focus,
        select:focus {
            outline: none;
            background-color: white;
            box-shadow: 0 0 10px rgba(138, 43, 226, 0.5);
            transform: translateY(-2px);
        }

        .radio-group {
            display: flex;
            gap: 20px;
            color: white;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            margin-bottom: 0;
            cursor: pointer;
        }

        .radio-group input[type="radio"] {
            width: auto;
            margin-right: 8px;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            color: white;
            font-size: 0.9em;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
            cursor: pointer;
        }

        .form-actions a {
            color: #a855f7;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.3s;
        }

        .form-actions a:hover {
            color: #d8b4fe;
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            margin-top: 25px;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(138, 43, 226, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .social-login {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .social-login p {
            color: white;
            margin-bottom: 15px;
            font-size: 0.95em;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1.5em;
        }

        .social-icon:hover {
            background: rgba(138, 43, 226, 0.5);
            transform: scale(1.1);
        }

        .toggle-text {
            text-align: center;
            color: white;
            margin-top: 25px;
        }

        .toggle-text a {
            color: #a855f7;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
            transition: color 0.3s;
        }

        .toggle-text a:hover {
            color: #d8b4fe;
        }

        .flip-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(138, 43, 226, 0.6);
            color: white;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            cursor: pointer;
            font-size: 1.5em;
            transition: all 0.3s;
            z-index: 10;
        }

        .flip-button:hover {
            background: rgba(138, 43, 226, 0.9);
            transform: scale(1.1) rotate(180deg);
        }

        @media (max-width: 600px) {
            .flip-card-front,
            .flip-card-back {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 2em;
            }

            .flip-card-container {
                height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="flip-card-container">
        <button class="flip-button" onclick="flipCard()">🔄</button>
        
        <div class="flip-card" id="flipCard">
            <!-- LOGIN SIDE -->
            <div class="flip-card-front">
                <h2 class="form-title">Login</h2>
                
                <form>
                    <div class="form-group">
                        <input type="email" placeholder="✉️ Email" required>
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="🔒 Password" required>
                    </div>

                    <div class="form-actions">
                        <label class="checkbox-wrapper">
                            <input type="checkbox"> Remember Me
                        </label>
                        <a href="#">Forgot Password?</a>
                    </div>

                    <button type="submit" class="submit-btn">Login</button>
                </form>

                <div class="toggle-text">
                    Don't have an account? <a onclick="flipCard()">Register</a>
                </div>

                <div class="social-login">
                    <p>Or login with</p>
                    <div class="social-icons">
                        <div class="social-icon">f</div>
                        <div class="social-icon">✈️</div>
                        <div class="social-icon">G</div>
                    </div>
                </div>
            </div>

            <!-- REGISTER SIDE -->
            <div class="flip-card-back">
                <h2 class="form-title">Register</h2>
                
                <form>
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" placeholder="Enter Your Name" required>
                    </div>

                    <div class="form-group">
                        <label>Your Age</label>
                        <input type="number" placeholder="Enter Your Age" required>
                    </div>

                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" required>
                    </div>

                    <div class="form-group">
                        <label>Your Email</label>
                        <input type="email" placeholder="Enter Your Email" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" placeholder="Phone Number" required>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="gender" value="male"> Male
                            </label>
                            <label>
                                <input type="radio" name="gender" value="female"> Female
                            </label>
                            <label>
                                <input type="radio" name="gender" value="other"> Other
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <select required>
                            <option>Your Current Address</option>
                            <option>Address 1</option>
                            <option>Address 2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Course</label>
                        <select required>
                            <option>Select a course</option>
                            <option>Course 1</option>
                            <option>Course 2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Shift</label>
                        <select required>
                            <option>Select a shift</option>
                            <option>Morning</option>
                            <option>Afternoon</option>
                            <option>Evening</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Create Password</label>
                        <input type="password" placeholder="Create Password" required>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" required>
                    </div>

                    <button type="submit" class="submit-btn">Submit</button>
                </form>

                <div class="toggle-text">
                    Already have an account? <a onclick="flipCard()">Login</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function flipCard() {
            const card = document.getElementById('flipCard');
            card.classList.toggle('flipped');
        }
    </script>
</body>
</html>