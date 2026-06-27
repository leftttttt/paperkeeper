<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="style.css">
    <title>Paperkeeper</title>
</head>

<body>
    <div class="navbar">
        
        <div class="user-icon">
            <a href="signup.php">
        <img src="images/user.jpg" alt="the user icon" width="40" height="40">
        </a>
        </div>

        <div class="title">
            <h1>Item</h1>
        </div>

        <div class="function-box">
            <div class="search">
            <form class="search" action="action_page.php">
                <input type="text" placeholder="search..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
</form>

            </div>

            <div class="filter">
                <select>
                    <option>physics</option>
                    <option>math</option>
                    <option>english</option>
                    <option>chinese</option>
                    <option>digi tech</option>
                </select>

            </div>
        </div>


    </div>

    <div class="item-box">

    </div>

    <div class="create">
        <a href="create.php">
        <button 
            title="Add New"
            class="group cursor-pointer outline-none hover:rotate-90 duration-300"
        >
    <svg
        xmlns="http://www.w3.org/2000/svg"
        width="50px"
        height="50px"
        viewBox="0 0 24 24"
        class="stroke-zinc-40 fill-none group-hover:fill-zinc-800 group-active:stroke-zinc-200 group-active:fill-zinc-600 group-active:duration-0 duration-300"
    >
            <path
            d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
            stroke-width="1.5"
            ></path>
            <path d="M8 12H16" stroke-width="1.5"></path>
            <path d="M12 16V8" stroke-width="1.5"></path>
            </svg>
        </button>
        </a>
    </div>

<a href="item.php">1</a>

    
</body>
<footer>
    
</footer>
</html>