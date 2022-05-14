<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex Pay</title>
</head>
<body>
    <?php 
        if(isset($_GET['reference'],$_GET['amount'],$_GET['description'],$_GET['devise'])){
            if(!empty($_GET['reference']) && !empty($_GET['amount']) && !empty($_GET['description']) && !empty($_GET['devise'])){
                $reference= trim(htmlspecialchars($_GET['reference']));
                $amount= trim(htmlspecialchars($_GET['amount']));
                $description= trim(htmlspecialchars($_GET['description']));
                $devise= trim(htmlspecialchars($_GET['devise']));
                
            }
        }
    ?>
    <div style="width: 100%;height: 100vh;display: flex;justify-content: center;align-items: center;">

<div style="text-align: center;">
<img src="9151-loading-spinner.gif" alt="" style="width: 200px;">
</div>
</div>
    <form action="https://cardpayment.flexpay.cd/v1/pay" method="post" id="form" style="display: none;">
        <div>
            <label for="authorization">authorization</label>
            <input type="text" name="authorization" value="Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJcL2xvZ2luIiwicm9sZXMiOlsiTUVSQ0hBTlQiXSwiZXhwIjoxNzAxOTUyMDI1LCJzdWIiOiI3MjNmNjcyNzVkZjM0NThhZDliOTU0MTE1YjgwMDEwMyJ9.imRNblJdZMKNugxruyCI5Yy6zUZLL5rVX-Kcho5nQC0"/>
        </div>
        <div>
            <label for="merchant">merchant</label>
            <input type="text" name="merchant" value="ELECTRAPPS"/>
        </div>
        <div>
            <label for="reference">reference</label>
            <input type="text" name="reference" value="<?= isset($reference) ? $reference :'' ?>"/>
        </div>
        <div>
            <label for="amount">amount</label>
            <input type="text" name="amount" value="<?= isset($amount) ? $amount :'' ?>"/>
        </div>
        <div>
            <label for="currency">currency</label>
            <select name="currency">
                <option value="CDF">CDF</option>
                <option value="USD" selected>USD</option>
            </select>
        </div>
        <div>
            <label for="description">description</label>
            <textarea type="text" name="description"><?= isset($description) ? $description :'' ?></textarea>
        </div>
        <div>
            <label for="callback_url">callback Url</label>
            <input type="text" name="callback_url" value="https://libaoo.com/pay/callback.php?phone=<?= $phone;?>"/>
        </div>
        <div>
            <label for="approve_url">Approve Url</label>
            <input type="text" name="approve_url" value="https://libaoo.com/pay/erreur.php"/>
        </div>
        <div>
            <label for="cancel_url">Cancel Url</label>
            <input type="text" name="cancel_url" value="https://libaoo.com/pay/erreur.php"/>
        </div>
        <div>
            <label for="decline_url">decline Url</label>
            <input type="text" name="decline_url" value="https://libaoo.com/pay/erreur.php"/>
        </div>
        <input type="submit" value="envoyer">
    </form>
    <script>

        window.addEventListener('load',()=>{
            document.querySelector('#form').submit()
        })
    </script>
</body>
</html>