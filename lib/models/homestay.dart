class Homestay {
  String? homestayId;
  String? userId;
  String? homestayName;
  String? homestayDesc;
  String? homestayPrice;
  String? homestayState;
  String? homestayLocal;
  String? homestayLat;
  String? homestayLon;
  String? homestayDate;

  Homestay(
      {this.homestayId,
      this.userId,
      this.homestayName,
      this.homestayDesc,
      this.homestayPrice,
      this.homestayState,
      this.homestayLocal,
      this.homestayLat,
      this.homestayLon,
      this.homestayDate});

  Homestay.fromJson(Map<String, dynamic> json) {
    homestayId = json['product_id'];
    userId = json['user_id'];
    homestayName = json['product_name'];
    homestayDesc = json['product_desc'];
    homestayPrice = json['product_price'];
    homestayState = json['product_state'];
    homestayLocal = json['product_local'];
    homestayLat = json['product_lat'];
    homestayLon = json['product_log'];
    homestayDate = json['product_date'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['product_id'] = homestayId;
    data['user_id'] = userId;
    data['product_name'] = homestayName;
    data['product_desc'] = homestayDesc;
    data['product_price'] = homestayPrice;
    data['product_state'] = homestayState;
    data['product_local'] = homestayLocal;
    data['product_lat'] = homestayLat;
    data['product_log'] = homestayLon;
    data['product_date'] = homestayDate;
    return data;
  }
}
