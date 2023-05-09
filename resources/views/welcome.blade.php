<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shamba </title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <style>
            body {
                padding: 2%;
                background-attachment: fixed;
                background-image: url('https://www.siyabona.com/images/stanley-safari-lodge-honeymoon-suite-deck-590x390.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(3.7px);
                -webkit-backdrop-filter: blur(3.7px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            form{
                border-radius: 10%;
                padding: 5%;
                background: rgba(255, 255, 255, 0.88);  
                width: 60%;
                margin: 0 auto;
                border-radius: 50px;
            }

            div.elem-group {
                margin: 20px 0;
            }

            div.elem-group.inlined {
                width: 49%;
                display: inline-block;
                float: left;
                margin-left: 1%;
            }

            label {
            display: block;
            font-family: 'Nanum Gothic';
            padding-bottom: 10px;
            font-size: 1.25em;
            }

            input, select, textarea {
            border-radius: 2px;
            border: 2px solid #777;
            box-sizing: border-box;
            font-size: 1.25em;
            font-family: 'Nanum Gothic';
            width: 100%;
            padding: 10px;
            }

            div.elem-group.inlined input {
            width: 95%;
            display: inline-block;
            }

            textarea {
            height: 250px;
            }

            hr {
            border: 1px dotted #ccc;
            }

            button {
            height: 50px;
            background: orange;
            border: none;
            color: white;
            font-size: 1.25em;
            font-family: 'Nanum Gothic';
            border-radius: 4px;
            cursor: pointer;
            }

            button:hover {
            border: 2px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="reservation.php" method="post">
            <div class="elem-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
            </div>
            <div class="elem-group">
              <label for="email">Your E-mail</label>
              <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
            </div>
            <div class="elem-group">
              <label for="phone">Your Phone</label>
              <input type="tel" id="phone" name="visitor_phone" placeholder="498-348-3872" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
            </div>
            <hr>
            <div class="elem-group inlined">
              <label for="adult">Adults</label>
              <input type="number" id="adult" name="total_adults" placeholder="2" min="1" required>
            </div>
            <div class="elem-group inlined">
              <label for="child">Children</label>
              <input type="number" id="child" name="total_children" placeholder="2" min="0" required>
            </div>
            <div class="elem-group inlined">
              <label for="checkin-date">Check-in Date</label>
              <input type="date" id="checkin-date" name="checkin" required>
            </div>
            <div class="elem-group inlined">
              <label for="checkout-date">Check-out Date</label>
              <input type="date" id="checkout-date" name="checkout" required>
            </div>
            <div class="elem-group">
              <label for="room-selection">Select Room Preference</label>
              <select id="room-selection" name="room_preference" required>
                  <option value="">Choose a Room from the List</option>
                  <option value="connecting">Connecting</option>
                  <option value="adjoining">Adjoining</option>
                  <option value="adjacent">Adjacent</option>
              </select>
            </div>
            <hr>
            <div class="elem-group">
              <label for="message">Anything Else?</label>
              <textarea id="message" name="visitor_message" placeholder="Tell us anything else that might be important." required></textarea>
            </div>
            <button type="submit">Book The Rooms</button>
          </form>

    </body>
    <script>
        var currentDateTime = new Date();
        var year = currentDateTime.getFullYear();
        var month = (currentDateTime.getMonth() + 1);
        var date = (currentDateTime.getDate() + 1);

        if(date < 10) {
            date = '0' + date;
        }
        if(month < 10) {
            month = '0' + month;
        }

        var dateTomorrow = year + "-" + month + "-" + date;
        var checkinElem = document.querySelector("#checkin-date");
        var checkoutElem = document.querySelector("#checkout-date");

        checkinElem.setAttribute("min", dateTomorrow);

        checkinElem.onchange = function () {
            checkoutElem.setAttribute("min", this.value);
        }
    </script>
</html>
