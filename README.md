## Social Post API

This repository contains the source code for Social Post API. The API allows users to post different blog-like posts with or without media in this system. User will be able to create the post and get requests to get those posts paginated. Every post have a like feature. There is track who and how many likes have been posted for a post with like count. Every Post have multiple comments from the user.


## Features

The Social Post API offers the following features:

- **Create Post:** Users can add new post with or without media by providing the necessary details, including the post title, content.
- **Retrieve Item:** Users can retrieve the details of all post with pagination as well as a specific post by providing its ID. Also users can retrieve commnet list with pagination and other details.
- **Search post:** posts can be searched by specifying post name.
- **Add like & comment:** user can add like or comment to a post. Also user can like a comment.



## Installation

To set up the Social Post API on your local machine, follow these steps:

- Clone the repository using the following command:

```
git clone https://github.com/saanchita-paul/social-post-api.git
```

- Navigate to the cloned directory:

```
cd social-post-api
```
- Install dependencies:

```
composer install
```

- Copy the .env.example file to .env:

```
cp .env.example .env
```
- Generate an application key:

```
php artisan key:generate
```

- Configure the database in the .env file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
- Migrate the database:

```markdown
php artisan migrate
```

- Run the following command to seed the database:

```
php artisan db:seed
```

- Start the development server:

```
php artisan serve
```

- Visit [localhost](http://localhost:8000) in your web browser to use the application.


## API Documentation

**Authorization**

The system incorporates authorization support for future utilization, employing a login registration system that incorporates a bearer token mechanism.

Upon successful login, the Bearer token can be obtained from the login response. This token should be included in the Authorization header of subsequent API requests.

Alternatively, you have the option to include the Bearer token directly in the SocialPostAPI collection. By doing so, there is no need to add the Authorization header for each API request.


**Currently, the API endpoints do not possess authorization requirements, allowing access without the presence of an authentication system.**


The API endpoints and their usage are documented below:

<details>
  <summary>Registration</summary>

- Endpoint:

  ```http
  POST /api/auth/register
  
  ```

- Description:
    ```
    This API endpoint allows users to register and create an account.
    ```

 </details>

 <details>
  <summary>Login</summary>

- Endpoint:

  ```http
  POST /api/auth/login
  
  ```

- Description:
    ```
    This API endpoint enables users to log in and obtain a Bearer token for authentication.
    ```

 </details>


 <details>
  <summary>Get User</summary>

- Endpoint:

  ```http
  GET /api/auth/user
  
  ```

- Description:
    ```
    This API endpoint retrieves information about all authenticated users.
    ```

 </details>


 <details>
  <summary>Create Post</summary>

- Endpoint:

  ```http
  POST /api/posts
  
  ```

- Description:
    ```
    This API endpoint allows user to create post with or without media
    ```

 </details>


 <details>
  <summary>Post List</summary>

- Endpoint:

  ```http
  GET /api/posts?per_page={per_page}&search={search}
  
  ```

- Description:
    ```
    This API endpoint allows the user to retrieve a list of all posts with image from the database. The user can apply filters to the results by adding query parameters to the endpoint. The per_page parameter specifies the number of posts to be returned per page, and the search parameter allows the user to search for posts by their title.
    ```

 </details>


  <details>
  <summary>Post Details</summary>

- Endpoint:

  ```http
  GET /api/posts/{postid}
  
  ```

- Description:
    ```
    This API endpoint allows the user to retrieve the details of a specific post based on its ID with image, comments, like count of each post and liked by.
    ```

 </details>


  <details>
  <summary>Add Like To A Post</summary>

- Endpoint:

  ```http
  POST /api/posts/{postid}/like
  
  ```

- Description:
    ```
    This API endpoint allows the user to add like to a post
    ```

 </details>



 <details>
  <summary>Add Comment On A Post</summary>

- Endpoint:

  ```http
  POST /api/posts/{postid}/comment
  
  ```

- Description:
    ```
    This API endpoint allows the user to add a comment on a post
    ```

 </details>



<details>
  <summary>Get Comments</summary>

- Endpoint:

  ```http
  GET /api/posts/{postid}/comments
  
  ```

- Description:
    ```
   This API endpoint allows the user to retrieve comments list with pagination of the post
    ```

 </details>

 <details>
  <summary>Like A Comment</summary>

- Endpoint:

  ```http
  POST /api/comments/{commentid}/like 
  
  ```

- Description:
    ```
   This API endpoint allows the user to like a comment
    ```

 </details>


 <details>
  <summary>Logout</summary>

- Endpoint:

  ```http
  POST /api/auth/logout
  
  ```

- Description:
    ```
      This API endpoint allows the user to log out from the application. When invoked, the access token associated with the user will be invalidated and removed.
    ```

 </details>





[Check Postman API Documentation](https://documenter.getpostman.com/view/15919922/2s93kxcRoV)
  
