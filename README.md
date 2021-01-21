# Laravel / lumen response api

a lightweight package for create and pass response for use in laravel || lumen

### Prerequisites

before start, you should have personal access token and SSH key.

* [how to create SSH-key](https://docs.gitlab.com/ee/ssh/README.html#generating-a-new-ssh-key-pair)
* [how to create personal access token](https://docs.gitlab.com/ee/user/profile/personal_access_tokens.html#creating-a-personal-access-token)

next you should add your personal access token to composer

```
$ composer config \
  --auth gitlab-token.gitlab.com "YOUR-TOKEN-HERE" \
  --no-ansi \
  --no-interaction
```

If you prefer to do this manually, create ~/.composer/auth.json, with the following content:
```
{
  "gitlab-token": {
    "gitlab.com": "YOUR-TOKEN-HERE"
  }
}
```

### Installation

easily copy below code and paste in your `composer.json`

```
"repositories": {
        "liateam/api-response" : {
            "type": "vcs",
            "url": "git@git.liateam.net:php/packages/api-response.git"
        }
    },
```

easily copy below code and paste in your `composer.json` -> `require` section

```
"liateam/api-response": "1.0.0"
```

run the command below in your project :

```
$ composer update
```

## Usage

you can use Facade or Dependency injection in your project :

## Facade Example :

``````
use Liateam\ApiResponse\ApiResponse;

ApiResponse::successResponse()
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessStatus(--boolean !!!--)
    // ->setResponseKey('data')
    // ->setResponseValue(--array-- => [  // --------------> SET DATA METHOD IS ONLY AVAILABLE FOR SUCCESS RESPONSE
        'projectName' => 'my awesome project',
        .
        .
        .
    ])
    ->render();


ApiResponse::failureResponse()
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessStatus(--boolean !!!--)
    // ->setResponseKey('error')
    // ->setResponseValue(--array-- => [ // --------------> SET ERROR METHOD IS ONLY AVAILABLE FOR ERROR RESPONSE
        'error text' => 'looks like something went wrong',
        .
        .
        .
    ])
    ->render();


ApiResponse::customResponse()
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessStatus(--boolean !!!--)
    // ->setResponseKey('additional')
    // ->setResponseValue(--array-- => [  // --------------> SET ADDITIONAL METHOD IS ONLY AVAILABLE FOR CUSTOM RESPONSE
    //    'custom message' => 'custom message goes here',
    //    .
    //    .
    //    .
    // ])
    ->render();
``````



## Dependency injection Example :

#### 1. first inject your class in constructor

`````

use Liateam\ApiResponse\Responses\CustomResponse;
use Liateam\ApiResponse\Responses\SuccessResponse;
use Liateam\ApiResponse\Responses\FailureResponse;

__construct(
    SuccessResponse $successResponse,
    ErrorResponse $errorResponse,
    CustomResponse $customResponse
    ) {
        $this->successResponse
        $this->errorResponse
        $this->customResponse
    }

`````
#### 2. use your injected classes wherever you want !
````

$successResponse = $this->successResponse
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessResponse(--boolean !!!--)
    // ->setResponseKey('data')
    // ->setResponseValue(--array-- => [  // --------------> SET DATA METHOD IS ONLY AVAILABLE FOR SUCCESS RESPONSE
        'projectName' => 'my awesome project',
        .
        .
        .
    ])
    ->render();



$errorResponse = $this->errorResponse
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessResponse(--boolean !!!--)
    // ->setResponseKey('error')
    // ->setResponseValue(--array-- => [ // --------------> SET ERROR METHOD IS ONLY AVAILABLE FOR ERROR RESPONSE
        'error text' => 'looks like something went wrong',
        .
        .
        .
    ])
    ->render();



$customResponse = $this->customResponse
    // ->setCode(XXXXX)
    // ->setMessage('BLAH BLAH BLAH !')
    // ->setSuccessStatus(BOOLEAN)
    // ->setResponseKey('additional')
    // ->setResponseValue([
    //    'custom text' => 'custom message here',
        .
        .
        .
    //])
    ->render();
````

## Authors

* **Mojtaba Rakhisi** - *Initial work* - [github](https://github.com/mojtabarks)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
