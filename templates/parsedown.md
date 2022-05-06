# Parsedown : Markdown to HTML

## Usage

Simply send a POST request to this endpoint with a text variable in body.

```curl
curl --location --request POST 'https://fathomless-reaches-93732.herokuapp.com/' \
--form 'text="#Title#
Welcome to the demo:
1. Write Markdown text on the left
2. Hit the __Parse__ button or `⌘ + Enter`
3. See the result to on the right
"'
```