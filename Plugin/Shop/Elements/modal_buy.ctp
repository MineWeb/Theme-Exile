<div class="modal-body-2">
  [IF REDUCTIONAL_ITEMS]
    <div class="alert alert-info">
      {REDUCTIONAL_ITEMS_LIST}
    </div>
  [/IF REDUCTIONAL_ITEMS]

  <p><div class="col-12">{ITEM_DESCRIPTION}</div></p><br>
  [IF AFFICH_SERVER]
    <p><b>{LANG-SERVER__TITLE} :</b> {ITEM_SERVERS}</p>
  [/IF AFFICH_SERVER]
  <hr>
  <p><div class="col-md-6 offset-sm-3 text-center"><input name="code" type="text" class="form-control" autocomplete="off" id="code-voucher" placeholder="{LANG-SHOP__BUY_VOUCHER_ASK}"></div></p>
    [IF MULTIPLE_BUY]
    <p><div class="col-md-6 offset-sm-3 text-center">
      <input type="text" value="1" name="quantity">
    </div></p>
  [/IF MULTIPLE_BUY]
</div>

<div class="modal-footer text-center">


  [IF ADD_TO_CART]
    <button type="button" class="btn btn-default add-to-cart" data-item-id="{ITEM_ID}" id="btn-cart">{LANG-SHOP__BUY_ADD_TO_CART}</button>
  [/IF ADD_TO_CART]
  <button type="button" style="background-color:#1e6bcc" class="btn-shop buy-item" data-item-id="{ITEM_ID}" id="btn-buy"><span id="total-price">{ITEM_PRICE}</span>  {SITE_MONEY} - {LANG-SHOP__BUY}</button>

