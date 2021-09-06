<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyStore!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            font-size: 14px;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
        tfoot{
            border-top: 3px solid;
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td width="25%" valign="top"><img alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFwAAABsCAIAAABo90KiAAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwwAADsMBx2+oZAAABHJJREFUeF7tnMG1qjAQhm83rwfKsAhrcPdacOPODty79BybcMPCAiyCO0AuTsKfMJCAROY72bwrTCafkxBE30+l9FApAJUCUCkAlQJQKQCVAlApgHgpz+qyq/7/i2qnXd0uh+pyrh636vU0sT9EtJRLb4SpGmm6n6uX6WdJ4qS8zu5IZmlk52Z6XIQ4KY9DbwBztgvNLNPzrGQlpW5LVE12Upp2OsxaMnlKqduuesx1kcpXStPm8ZK5FGoPk0tC8pdCLbWXBaQczMEQ2rxSo10sbWdPzonyFuxiPJ+W4vKs7pOqj7Yw6ViblJZJatJNonVKaXjdxk2o09mcGM2KpdQ8x3lJVCwrl0KM8ZKoWNYvhbj1YvpbimLJQoqwo6aluAxlImXEJErQXS5S5MWyi7+BzkeKvFjusXeJGUmpqrvsE/LoZSUrKcIZFH1hzkqK9Noc22NeUoTLSuxam5cU4WOmrUkRrrVx+1qVAshNiqhHlQKbSgFNpYCmUkDblhS9+gBEUnRHC9q2pAjvfWJ7zEuK7C55Wx8diLrb2odMwm9ibunjSPHTn7jrMZGPFOHcSdFdLlLEH+Vv6GGYtEwSzB0iCynyZ8lppur6pcgfmCb7PtPKpTzH/CAiwQPTljVLGVMj1BKVCbFWKaLIvKVZTVrWJuVZxxxVIG2L3sVyPi0lyfdo030FsGUBKXO3lBOnJXcpya44nKylzGKEyFbKnL+DylNKui0JJDcpVCCz/SCsIyMpM/4+ziFOyjK/S16kOjhxUoi5fsG+a37iv6iLjmgp9Y2s7FGmr63sPzog4qV8ISoFoFIAKgWgUgAqBaBSACoFoFIAKgUQklKW1+O+KH7eFEWxP17L0hzwrfiklEcuw6E4Wlqu72P3128QhqVc92aQHvZXc2ADO9rRlSlIiqWkYG/+33xyK2UDUqyZY9cEZgtSeKGEBzlm4SHaOmOn+NbtskuhDVLSefzfb3rXgiRXgqFKCS6d1jxzsfKnYYb8OZ28M6AgdicsaigmRTRHTWFwTSHIPjYjrZSgPAMfRSBuF3UwpvWmjANJ8STVFKY5woLlhzKx0md+nXea18CgFB5zf+ymS0kTzfyVmFwtUArhzQtUTVCKFaiXJh/c+1y38+Lv3SjN8NlpoZBTrfikEM0aZsLbOEMPSuHDBklCK45IN6R1Uoh+NjICUlpofbe3+g1WdyEpfHwoR/j6wEluIXlBHUoYlGKgsrEzYe/6WqVMvgRJpdRYybBkPykFxYxmjBRrLk+olKE1pXt5aNSePJLRl0IZ0cUX+ee58FyDOYat4JBDUoZMx9KX8pdns2XrEnLWFCtVPjLKsXmFLp7mCGsEgX0KG9yQlF5MvoGijtvLJjxThF9KALc7eMr7IEFE+/0elOJqgaSUUg8i0CGcWihFnlPoNqUO6WxFBFKIYExi+rzyLbRUgu7tZ/j+097OoNulpqpBSPMyg2KZQ7rp6KEX00T13JAI8UnZNCoFoFIAKgWgUgAqBaBSACoFoFJ6VNUvs+y7iXr720wAAAAASUVORK5CYII=" />
        </td>
        <td width="50%" align="center" style="font-size: 50px; text-decoration-line: underline; text-decoration-style: double;">Invoice</td>
        <td align="right">
            <h3>Dynamic Store Ltd.</h3>
            <span>+8801744508287</span> <br>
            <span><a href="https://github.com/idbmannaf">https://github.com/idbmannaf</a></span> <br>
            <p><b>Order Id: </b> {{$order->id}}</p>
            <p><b>Invoice Id: </b> {{$order->invoice}}</p>
        </td>
    </tr>

</table>

<table width="100%">
    <tr>
        <td><strong>From:</strong> Abdul Mannaf</td>
        <td></td>
        <td></td>
        <td><strong>To:</strong>{{$billing_details->first_name ." ". $billing_details->last_name}}</td>
    </tr>
    <tr>
        <td><strong>Compay:</strong> Dstore</td>
        <td></td>
        <td></td>
        <td><strong>Company:</strong> {{$billing_details->company_name}}</td>
    </tr>
    <tr>
        <td><strong>Email:</strong> idbmananf@gmail.com</td>
        <td></td>
        <td></td>
        <td><strong>Email:</strong>{{$billing_details->email}} </td>
    </tr>
    <tr>
        <td><strong>Address:</strong> 488/1, West Shawrapara, Mirpur, Dhaka-1216</td>
        <td></td>
        <td></td>
        <td><strong>Address:</strong> {{$billing_details->address .", ".$billing_details->country}}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Phone:</strong> {{$billing_details->phone}} </td>
    </tr>

</table>

<br/>

<table width="100%">
    <thead style="background-color: lightgray; font-size: 30px">
    <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
    </tr>
    </thead>
    <tbody>
    <?php $sl=1; ?>
    @foreach($order_details as $o)
        <tr>
            <th scope="row">{{$sl++}}</th>
            <td>{{$o->product_name}}</td>
            <td align="right">{{$o->quantity}}</td>
            <td align="right">{{$o->product_price}}</td>
            <td align="right">{{$o->quantity * $o->product_price}}</td>
        </tr>
    @endforeach
    <tfoot>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 20px" align="right">Total :</td>
        <td style="font-size: 15px" align="right">{{$order->total}}$</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 20px" align="right">Discount :</td>
        <td  style="font-size: 15px" align="right">{{$order->discount}}$</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 20px" align="right">Subtotal $</td>
        <td style="font-size: 15px" align="right" class="gray">${{$order->subtotal}} </td>
    </tr>
    </tfoot>
</table>
<footer>
<p align="center"><img width="100px" style="border-radius: 50%" alt="" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/4QAiRXhpZgAATU0AKgAAAAgAAQESAAMAAAABAAEAAAAAAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAGzAjwDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD91KKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiih2Tsx2YUUUUC1Ciiii67r7wCiiinZjswooopCCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooop8r7DswoooC5UnrjsKXoFmFFIzKq53IMfeyTx+n88Vy3ir41+F/BaH+0NZso5B/yySQSSH8Fz/OvLzHOsDgIe0xlWMF/eaX5kSko7nU5yf8AE9acFyOuB2JHB+leI+If24NDsXI07SdS1Bo+hl2wRn8ef5VxGtft0eILmTOn6TpNmPWXdO35gqP0r8yzjx14SwF1LEObXSKuvk7bGP1qC6n1JtJ+7z60oQt/+o18Zan+1p45vSxTVIbUMekVpHx+LBj+ZrJn/aO8cSg58Sah+G1f0UAfpXxOI+k9w7HSnSqv7jP68j7iYFDgj8gf8KDx6/lXwqP2iPG6cr4k1HI9WH+FXLH9qbx5ZH/kYJpvaWCJx+qZ/WsqP0oMik/3lCa+4PryPuALlW/2ewFNYYHt9K+QNI/bb8Y6eEFxHo+oKOvnWxVvw2sAPyrtfDn/AAUBtbiVY9W8P3EfZpLOcTY+qELj8zX2GU+P3CeNahKcqcn3T/RWL+uQ7n0UDkUV554Q/an8D+MpEih1iGzuX4EF2DEwP1+7+td/b3KXkKyQsskTDIdXUr+ecH8K/Ucq4iyzMYc+CrxmvJq/z8zeNSMtiSigc/xL0yPeivZ5lbmW3kUFFFFU9NwCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiilcAoopVG4/wAVU1bcFrsJSbsA+g9KxvG3xD0f4eac1zq17DaqB8qE5klP+yvU/pXgfxK/bE1LWWkt/D1v/Zlv937TKN1ww9h0T/x714r81408Vsg4bh/tlRup0itfy2+ZnWrRgtz37xd4+0fwJZmbVtQtbFcZUSONz/QDmvGfHf7bEURZPDunGXbwLu8GFT/dTv8AnXgerapca3eNc3k811cSHLSStuZj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gAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD//2Q==" /></p>
</footer>
</body>
</html>
