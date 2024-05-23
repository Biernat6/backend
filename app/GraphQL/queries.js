import { gql } from "@apollo/client";

export const GET_PRODUCTS_BY_PRICE = gql`
  query ProductsByPrice($minPrice: Float!, $maxPrice: Float!) {
    productsByPrice(minPrice: $minPrice, maxPrice: $maxPrice) {
      id
      name
      unit_price
    }
  }
`;